<?php

namespace App\Http\Livewire\User;

use Ramsey\Uuid\Uuid;
use App\Models\Account;
use Livewire\Component;
use App\Library\Constant;
use App\Models\SocialNetwork;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Intervention;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\RedirectController;
use App\Http\Controllers\RedirectionController;

class Profile extends Component
{
    use WithFileUploads;

    public $user;
    public $image;
    public $showImage;
    public $socialNetworks;
    public $accountSocialNetwork;
    public $account;
    public $defaultImages;
    public $password;
    public $password_confirmation;
    public $currentPassword;
    public $rules = [
        'account.name'                          => 'required|min:3',
        'user.email'                            => 'required|email',
        'user.name'                             => 'required|min:3',
        'user.surname'                          => 'required|min:3',
        'account.webpage'                       => 'nullable|string',
        'account.nickname'                      => 'required|regex:/^[a-zA-Z0-9-]+$/',
        'account.description'                   => 'required|max:500',
        'accountSocialNetwork.*.*.pivot.url'    => 'nullable|string',
        'password'                              => 'nullable|min:8|confirmed',
        'password_confirmation'                 => 'nullable|min:8',
        'currentPassword'                       => 'nullable|min:8',
    ];

    public function render()
    {
        return view('livewire.user.profile');
    }

    public function mount($nickname)
    {
        $this->user     = auth()->user();

        if ($this->user->account->nickname != $nickname) {
            abort(401);
        }
        $this->image = Storage::disk('public')->url
        ($this->user->image);
        $this->showImage = auth()->user()->temporaryImage();
        $this->socialNetworks       = SocialNetwork::all();
        $this->account              = $this->user->account;
        $this->accountSocialNetwork = $this->account->socialNetworks->groupBy('id')->toArray();
        $this->defaultImages = Constant::IMAGES;
    }

    public function updated($key, $value)
    {
        if ($key == 'image') {
            // verify if exist value in constants
            if (!in_array($value, Constant::IMAGES)) {
                $name               = Uuid::uuid4() . '.' . $value->getClientOriginalExtension();
                if (Storage::disk('public')->exists('unmarked/profile/' . $this->user->image)) {
                    Storage::disk('public')->delete('unmarked/profile/' . $this->user->image);
                }

                $url                = $this->image->storeAs('unmarked/profile', $name, 'public');
                $imageToResize = Storage::disk('public')->url($url);
                $resizedImage       = Intervention::resizeImage($imageToResize, 500, 500);
                Storage::disk('public')->put($url, $resizedImage);

                $this->user->update(
                    [
                        'image'         => $name,
                        'default_image' => false
                    ]
                );
            } else {
                $this->user->update(
                    [
                        'image' => $value
                    ]
                );
            }
            session()->flash('success', 'Los cambios se han guardado.');
            $this->showImage = $this->user->temporaryImage();
        } else {
            $explodeKey = explode('.', $key);
            if (isset($explodeKey[0]) && isset($explodeKey[1])) {
                if ($explodeKey[0] == 'account' && $explodeKey[1] == 'nickname' && $value != $this->account->getOriginal('nickname')) {

                    $this->validateOnly(
                        'account.nickname',
                        ['account.nickname' => 'required|unique:accounts,nickname,' . $this->account->id . '|regex:/^[a-zA-Z0-9-]+$/']
                    );
                } elseif ($explodeKey[0] == 'user' && $explodeKey[1] == 'email') {
                    $this->validateOnly(
                        'user.email',
                        ['user.email' => 'required|email|unique:users,email,' . $this->user->id]
                    );
                } else {
                    $this->validateOnly($key);
                }
            } else {
                $this->validateOnly($key);
            }

            // if ($key[0] != 'accountSocialNetwork') {
            //     if (isset($key[1])) {
            //         if ($key[1] == 'webpage') {
            //             $this->validateOnly($key[0] . '.' . $key[1], [$key[0] . '.' . $key[1] => 'required|string|min:3']);
            //             $url = strpos($value, 'http') !== 0 ? "https://$value" : $value;
            //             $value = $url;
            //         } else {
            //             $this->validateOnly($key[0] . '.' . $key[1]);
            //         }
            //         $model = $key[0] == 'user' ? $this->user : $this->account;
            //         $model->update(
            //             [
            //                 $key[1] => $value
            //             ]
            //         );

            //         session()->flash('success', 'Los cambios se han guardado.');
            //     }
            // }
        }
    }

    public function saveSocialNetwork($socialNetworkId)
    {
        try {
            $this->validateOnly(
                'accountSocialNetwork.' . $socialNetworkId . '.0.pivot.url',
                ['accountSocialNetwork.' . $socialNetworkId . '.0.pivot.url' => 'nullable']
            );
            $url = $this->accountSocialNetwork[$socialNetworkId][0]['pivot']['url'];
            $this->account->socialNetworks()->syncWithoutDetaching([$socialNetworkId => ['url' => $url]]);
            session()->flash('success-rrss', 'Red social actualizada correctamente');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());

            session()->flash('error-rrss', 'Error al actualizar la red social. ' . $th->getMessage());
        }
    }

    public function setDefaultImage($image)
    {
        $this->image = $image;
        auth()->user()->update(
            [
                'image'             => $image,
                'default_image'     => true
            ]
        );
        $this->showImage = auth()->user()->temporaryImage();
    }

    public function updatePassword()
    {
        $verify = auth()->attempt(
            [
                'email' => auth()->user()->email,
                'password' => $this->currentPassword
            ]
        );
        if ($verify) {
            try {
                $this->validateOnly(
                    'password',
                    ['password' => 'required|min:8|confirmed']
                );
                $this->user->update(
                    [
                        'password' => bcrypt($this->password)
                    ]
                );
                session()->flash('password-updated', 'Contraseña actualizada correctamente');
            } catch (\Throwable $th) {
                Log::error($th->getMessage());
                session()->flash('password-error', 'Error al actualizar la contraseña. ' . $th->getMessage());
            }
        } else {
            session()->flash('password-error', 'La contraseña actual no coincide');
        }
    }

    public function update()
    {
        try {
            $nicknameUpdated    = false;
            $originalNickname   = $this->account->getOriginal('nickname');
            $this->validate();

            if ($this->account->nickname != $this->account->getOriginal('nickname')) {
                $this->account->nickname    = $this->generateSlug($this->account->nickname);
                $nicknameUpdated            = true;
            }

            $this->user->save();
            $this->account->save();

            if ($nicknameUpdated) {
                RedirectionController::redirection($originalNickname, $this->account->nickname, $this->account);
            }

            $this->redirect(route('authors.show', ['author' => $this->account->nickname]));
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function generateSlug($text = null)
    {
        $i = 0;

        do {
            if ($text != null) {
                $slug = $text;
            }

            $slug = str($slug)->slug(language: 'es');
            $slug = strtolower($slug);

            $slugExists = Account::where('nickname', $slug)->first();

            if ($slugExists) {
                $slug = $slug . '-' . rand(0, 100);
            }
            $i++;
        } while ($slugExists && $i < 100);

        return $slug;
    }
}
