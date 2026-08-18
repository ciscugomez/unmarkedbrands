<?php

namespace App\Http\Livewire\Publications;

use Exception;
use Ramsey\Uuid\Uuid;
use App\Models\Account;
use Livewire\Component;
use App\Library\Constant;
use App\Models\Publication;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Intervention;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\RedirectionController;

class Form extends Component
{
    use WithFileUploads;

    public Publication  $publication;
    public string       $imageBefore;
    public mixed        $imageAfter;
    public mixed        $uploadImageBefore;
    public mixed        $uploadImageAfter;
    public array        $content;
    public bool         $newProject;
    public mixed        $account;
    public array        $imagesToDelete;
    public int          $maxFiles           = 50;
    public int          $maxFilesByInput    = 3;
    public array        $categories;
    public bool         $alertModal         = false;
    public array        $imagesToUploadInS3 = [];
    public mixed        $agency;
    public mixed        $slug;
    public bool         $creatingProject;
    public array        $filepondImages     = [];
    public array        $contentCopy        = [];

    protected $rules = [
        'publication.title'                             => 'required',
        'publication.slug'                              => 'nullable',
        'publication.subtitle'                          => 'required',
        'publication.category'                          => 'required',
        'publication.brand_created_at_year'             => 'required|integer|min:1901|max:2100',
        'publication.brand_created_at_month'            => 'required|integer|min:1|max:13',
        'publication.brand'                             => 'required',
        'publication.webpage'                           => 'nullable',
        'uploadImageAfter'                              => 'nullable|mimes:png,jpg|max:5120', // 5MB Max
        'uploadImageBefore'                             => 'nullable|mimes:png,jpg|max:5120', // 5MB Max
        'content.*'                                     => 'required', // 5MB Max
    ];


    protected $messages = [
        'publication.title.required'                    => 'El título es obligatorio',
        'publication.subtitle.required'                 => 'El subtítulo es obligatorio',
        'publication.category.required'                 => 'La categoría es obligatoria',
        'publication.brand_created_at_year.required'    => 'El año de creación de la marca es obligatorio',
        'publication.brand_created_at_year.integer'     => 'El año de creación de la marca debe ser un número',
        'publication.brand_created_at_year.min'         => 'El año de creación de la marca debe ser mayor a 1900',
        'publication.brand_created_at_year.max'         => 'El año de creación de la marca debe ser menor a 2100',
        'publication.brand_created_at_month.required'   => 'El mes de creación de la marca es obligatorio',
        'publication.brand_created_at_month.integer'    => 'El mes de creación de la marca debe ser un número',
        'publication.brand_created_at_month.min'        => 'El mes de creación de la marca debe ser mayor a 1',
        'publication.brand_created_at_month.max'        => 'El mes de creación de la marca debe ser menor a 13',
        'publication.brand.required'                    => 'La marca es obligatoria',
        'uploadImageAfter.mimes'                        => 'La imagen debe ser un archivo de tipo: png, jpg, gif',
        'uploadImageAfter.max'                          => 'La imagen no debe pesar más de 5MB',
        'uploadImageBefore.mimes'                       => 'La imagen debe ser un archivo de tipo: png, jpg, gif',
        'uploadImageBefore.max'                         => 'La imagen no debe pesar más de 5MB',
        'content.*.required'                            => 'El contenido es obligatorio',
        'publication.webpage.url'                       => 'La página web debe ser una URL válida',
    ];

    public function mount($agency = null, $slug = null)
    {
        $this->agency = $agency;
        $this->slug = $slug;
        if ($this->agency != null && $this->slug != null) {
            try {
                $this->creatingProject      = false;
                $this->account              = Account::where('nickname', $agency)->firstOrFail();
                $this->publication          = Publication::where('slug', $slug)->firstOrFail();
                $this->content              = json_decode($this->publication->content, true);
                $this->imageBefore          = Storage::disk('public')->url('projects/' . $this->publication->image_before);                
                $this->uploadImageBefore    = '';
                $this->imagesToDelete       = [];
                $this->newProject           = true;
                $this->uploadImageAfter     = '';
                $this->categories           = Constant::CATEGORIES;

                if ($this->publication->image_after) {
                    $this->imageAfter = Storage::disk('public')->url('projects/' . $this->publication->image_after);
                    $this->newProject       = false;
                    $this->uploadImageAfter = '';
                } else {
                    $this->imageAfter       = '';
                }

                foreach ($this->content as $key => $value) {
                    if ($value['type'] == 'image') {
                        $this->content[$key]['new_urls'] = [];
                        $this->content[$key]['new_footer'] = '';
                        if (!isset($this->content[$key]['limit'])) {
                            $this->content[$key]['limit'] = count($this->content[$key]['value']);
                        }
                    }
                }

                $content = [];
                foreach ($this->content as $key => $value) {
                    $slug                       = str()->random(5);
                    $content[$slug]   = $value;
                }

                $this->content = $content;
            } catch (\Throwable $th) {
                abort(404);
            }
        } else {
            $this->creatingProject      = true;
            $this->newProject           = false;
            $this->categories           = Constant::CATEGORIES;
            $this->publication          = new Publication();
            $this->content              = [];
            $this->imageBefore          = '';
            $this->uploadImageBefore    = '';
            $this->imagesToDelete       = [];
            $this->uploadImageAfter     = '';
            $this->imageAfter           = '';
            $this->account              = auth()->user()->account;
        }

        $this->contentCopy = $this->content;
    }

    public function generateTextForm()
    {
        $key = str()->random(5);

        $this->content[$key] = [
            'type'      => 'text',
            'value'     => '',
            'is_new'    => true

        ];
        $this->contentCopy[$key] = $this->content[$key];
    }

    public function generateImageForm($limit)
    {
        $key = str()->random(5);
        $this->content[$key] = [
            'type'          => 'image',
            'value'         => [],
            'new_urls'      => [],
            'limit'         => $limit,
            'footer'        => '',
            'new_footer'    => '',
            'is_new'        => true
        ];
        $this->contentCopy[$key] = $this->content[$key];
    }

    public function deletePosition($key)
    {
        $type = $this->content[$key]['type'];

        if ($type == 'image' && !$this->creatingProject) {
            $images = $this->content[$key]['value'];

            foreach ($images as $key2 => $value) {
                $this->imagesToDelete[] = $value;
            }
        }
        unset($this->content[$key]);
        unset($this->contentCopy[$key]);

        if (isset($this->filepondImages[$key])) {
            unset($this->filepondImages[$key]);
        }
    }

    public function render()
    {
        return view('livewire.publications.form');
    }

    public function removeUploadImages($url)
    {
        if (env('APP_ENV') != 'local') {
            if (Storage::disk('public')->exists($url)) {
                Storage::disk('public')->delete($url);
            }
        }
    }

    public function removeAndSetNull($field, $column)
    {
        $column                                         = (int) $column;
        $this->content[$field]['value'][$column]        = null;
        $this->contentCopy[$field]['value'][$column]    = null;

        if (isset($this->filepondImages[$field][$column])) {
            unset($this->filepondImages[$field][$column]);
        }
    }

    public function updated($propertyName, $value)
    {
        $this->validateOnly($propertyName);
        $variables = explode('.', $propertyName);

        if ($this->publication->id == null) {
            if ($variables[0] == 'content' && $variables[2] == 'footer') {
                $this->contentCopy[$variables[1]]['footer'] = $value;
            }
        }else{
            if ($variables[0] == 'content' && $variables[2] == 'new_footer') {
                $this->contentCopy[$variables[1]]['new_footer'] = $value;
            }
        }
    }

    public function uploadPublicationImages()
    {
        $updatedContents = $this->content;

        foreach ($this->content ?? [] as $key => $value) {
            if ($value['type'] == 'image') {
                if (!$this->creatingProject) {
                    $oldImages = $value['value'];
                    $newImages = $value['new_urls'];

                    if (isset($updatedContents[$key]['is_new'])) {

                        if (count($newImages) == 0 || in_array(null, $newImages) || count($newImages) != $value['limit']) {
                            $this->alertModal = true;
                            throw new Exception('Tienes que subir todas las imágenes de contenido');
                        }
                    }

                    if (count($newImages) > 0) {

                        $limit = $value['limit'];

                        if ($limit == 1) {
                            $width  =  Constant::SIZES['content']['one_image']['width'];
                            $height =  Constant::SIZES['content']['one_image']['height'];
                        } elseif ($limit == 2) {
                            $width  = Constant::SIZES['content']['two_image']['width'];
                            $height = Constant::SIZES['content']['two_image']['height'];
                        } elseif ($limit == 3) {
                            $width  = Constant::SIZES['content']['three_image']['width'];
                            $height = Constant::SIZES['content']['three_image']['height'];
                        }

                        if (count($oldImages) == 0 && $limit != count($newImages)) {
                            $this->alertModal = true;
                            throw new Exception('Error al subir imágenes del contenido.');
                        }

                        foreach ($newImages as $key2 => $value2) {
                            if ($value2 != null) {

                                $this->validate(
                                    [
                                        'content.' . $key . '.new_urls.' . $key2 => 'required|mimes:png,jpg|max:5120', // 5MB Max
                                    ],
                                    [
                                        'content.' . $key . '.new_urls.' . $key2 . '.required' => 'La imagen de contenido es obligatoria',
                                        'content.' . $key . '.new_urls.' . $key2 . '.max' => 'La imagen de contenido debe pesar menos de 5MB',
                                        'content.' . $key . '.new_urls.' . $key2 . '.mimes' => 'La imagen de contenido debe ser un archivo de tipo: png, jpg, gif',
                                    ]
                                );

                                $originalExtension  = $value2->getClientOriginalExtension();
                                $name               = (string)Uuid::uuid4() . '.' . $originalExtension;
                                $imageToResize      = $value2->temporaryUrl();
                                $sizes              = Intervention::getImageSize($imageToResize);


                                $this->imagesToUploadInS3[] = [
                                    'name'      => $name,
                                    'image'     => $value2,
                                    'logo'      => false,
                                    'width'     => $width,
                                    'height'    => $height,
                                    'positions' => ['content' => $key, 'value' => $key2]
                                ];

                                // $value2->storeAs('unmarked', $name, 'public');
                                if (isset($updatedContents[$key]['value'][$key2])) {
                                    $this->imagesToDelete[] = $updatedContents[$key]['value'][$key2];
                                }
                                $updatedContents[$key]['value'][$key2] = $name;
                            }
                        }
                    } else {
                        // If not new images, save old images in array (to maintain the json structure)

                        $updatedContents[$key]['value'] = [];
                        foreach ($oldImages as $imageName) {
                            $updatedContents[$key]['value'][] = $imageName;
                        }
                    }

                    if (isset($updatedContents[$key]['new_footer'])) {

                        if ($updatedContents[$key]['new_footer'] != '') {
                            $updatedContents[$key]['footer'] = $updatedContents[$key]['new_footer'];
                        }
                    }
                    $this->content = $updatedContents;
                } else {
                    $images = $value['value'];
                    $limit  = $value['limit'];
                    if (count($images) != $limit || in_array(null, $images)) {
                        $this->alertModal = true;
                        throw new Exception('Debes subir en total ' . $limit . ' imágenes.');
                    }
                    foreach ($images as $key2 => $image) {
                        $this->validate(
                            [
                                'content.' . $key . '.value.' . $key2 => 'required|max:5120|mimes:png,jpg', // 5MB Max
                            ],
                            [
                                'content.' . $key . '.value.' . $key2 . '.required' => 'La imagen es obligatoria',
                                'content.' . $key . '.value.' . $key2 . '.max' => 'La imagen debe pesar menos de 5MB',
                                'content.' . $key . '.value.' . $key2 . '.mimes' => 'La imagen de contenido debe ser un archivo de tipo: png, jpg',
                            ]
                        );

                        $originalExtension = $image->getClientOriginalExtension();
                        $name = (string)Uuid::uuid4() . '.' . $originalExtension;

                        // Get image dimension size
                        $imageToResize = $image->temporaryUrl();
                        $sizes = Intervention::getImageSize($imageToResize);

                        $this->imagesToUploadInS3[] = [
                            'image'     => $image,
                            'name'      => $name,
                            'logo'      => false,
                            'width'     => $sizes['width'],
                            'height'    => $sizes['height'],
                            'positions' => ['content' => $key, 'value' => $key2]
                        ];

                        $this->content[$key]['value'][$key2] = $name;
                        unset($this->content[$key]['new_urls']);
                        unset($this->content[$key]['new_footer']);
                    }
                }
            }
        }
    }

    public function uploadImages()
    {
        $this->verifyAndUploadLogos();
        $this->uploadPublicationImages();
    }

    public function verifyAndUploadLogos()
    {

        if (!$this->creatingProject) {
            //Update project
            $this->validate(
                [
                    'uploadImageBefore' => 'nullable|mimes:png,jpg|max:5120', // 5MB Max
                ],
                [
                    'uploadImageBefore.max'     => 'La imagen de portada debe pesar menos de 5MB',
                    'uploadImageBefore.mimes'   => 'La imagen de portada debe ser un archivo de tipo: png, jpg',
                ]
            );

            if ($this->uploadImageBefore != null) {
                $beforeOriginalExtension = $this->uploadImageBefore->getClientOriginalExtension();
                $beforeName = (string)Uuid::uuid4() . '.' . $beforeOriginalExtension;
                $this->imageBefore = $beforeName;
                $this->imagesToUploadInS3[] = [
                    'image'     => $this->uploadImageBefore,
                    'name'      => $beforeName,
                    'logo'      => true,
                    'type'      => 'before'
                ];
            } else {
                $this->imageBefore = $this->publication->getOriginal('image_before');
            }



            if ($this->uploadImageAfter != null) {

                $this->validate(
                    [
                        'uploadImageAfter'          => 'required|mimes:png,jpg|max:5120', // 5MB Max
                    ],
                    [
                        'uploadImageAfter.max'      => 'La imagen de portada debe pesar menos de 5MB',
                        'uploadImageAfter.mimes'    => 'La imagen de portada debe ser un archivo de tipo: png, jpg',
                    ]
                );

                $afterOriginalExtension     = $this->uploadImageAfter->getClientOriginalExtension();
                $afterName                  = (string)Uuid::uuid4() . '.' . $afterOriginalExtension;
                $this->imageAfter           = $afterName;

                $this->imagesToUploadInS3[] = [
                    'image'                 => $this->uploadImageAfter,
                    'name'                  => $afterName,
                    'logo'                  => true,
                    'type'                  => 'after'
                ];
            } else {
                if ($this->newProject) {
                    $this->imageAfter = '';
                    $this->imagesToDelete[] = $this->publication->getOriginal('image_after');
                } else {
                    $this->imageAfter = $this->publication->getOriginal('image_after');
                }
            }
        } else {
            // Creating project
            $this->validate(
                [
                    'uploadImageBefore'             => 'required|mimes:png,jpg|max:5120', // 5MB Max
                ],
                [
                    'uploadImageBefore.required'    => 'La imagen de portada es obligatoria',
                    'uploadImageBefore.max'         => 'La imagen de portada debe pesar menos de 5MB',
                    'uploadImageBefore.mimes'       => 'La imagen de portada debe ser un archivo de tipo: png, jpg',
                ]
            );

            $beforeOriginalExtension    = $this->uploadImageBefore->getClientOriginalExtension();
            $beforeName                 = (string)Uuid::uuid4() . '.' . $beforeOriginalExtension;
            $this->imageBefore          = $beforeName;

            $this->imagesToUploadInS3[] = [
                'image'                 => $this->uploadImageBefore,
                'name'                  => $beforeName,
                'logo'                  => true,
                'type'                  => 'before'
            ];

            if (!$this->newProject) {
                $this->validate(
                    [
                        'uploadImageAfter' => 'required|mimes:png,jpg|max:5120', // 5MB Max
                    ],
                    [
                        'uploadImageAfter.required'    => 'La imagen de portada es obligatoria',
                        'uploadImageAfter.max'         => 'La imagen de portada debe pesar menos de 5MB',
                        'uploadImageAfter.mimes'       => 'La imagen de portada debe ser un archivo de tipo: png, jpg',
                    ]
                );

                $afterOriginalExtension     = $this->uploadImageAfter->getClientOriginalExtension();
                $afterName                  = (string)Uuid::uuid4() . '.' . $afterOriginalExtension;
                $this->imageAfter           = $afterName;

                $this->imagesToUploadInS3[] = [
                    'image'                 => $this->uploadImageAfter,
                    'name'                  => $afterName,
                    'logo'                  => true,
                    'type'                  => 'after'
                ];
            }
        }
    }

    public function deleteImages($images)
    {
        foreach ($images as $key => $value) {
            $this->removeUploadImages('projects/' . $value);
            $this->removeUploadImages('originals/' . $value);
            $this->removeUploadImages('projects/thumb/' . $value);
            $this->removeUploadImages('projects/originals/' . $value);
        }
    }

    public function save()
    {
        $this->alertModal = false;
        try {
            $this->validate();
            $this->uploadImages();

            $this->publication->image_before    = $this->imageBefore;
            $this->publication->image_after     = $this->imageAfter;
            $slugChanged                        = false;
            $originalSlug                       = $this->publication->getOriginal('slug');

            // Set initial values when creating
            if ($this->publication->id == null) {
                $this->publication->slug        = $this->generateSlug(null);
                $this->publication->account_id  = $this->account->id;
                $this->publication->creator_id  = auth()->user()->id;
            } else {
                if ($this->publication->slug != $this->publication->getOriginal('slug') && $this->publication->slug != null && $this->publication->slug != '') {
                    $this->validateOnly('publication.slug', [
                        'publication.slug' => 'unique:publications,slug'
                    ], [
                        'publication.slug.unique' => 'La url del proyecto ya existe'
                    ]);
                    $slugChanged = true;
                }

                if ($this->publication->slug == null || $this->publication->slug == '') {
                    $this->publication->slug = $this->publication->getOriginal('slug');
                }
            }

            // Save content
            $newContent = [];
            foreach ($this->content as $value) {
                if (isset($value['is_new'])) {
                    unset($value['is_new']);
                }
                if (isset($value['new_urls'])) {
                    unset($value['new_urls']);
                }
                if (isset($value['new_footer'])) {
                    unset($value['new_footer']);
                }
                if ($value['type'] == 'text') {
                    if ($value['value'] == '') {
                        throw new Exception('El contenido de texto no puede estar vacío');
                    }
                }
                $newContent[] = $value;
            }

            if ($this->publication->slug != $this->publication->getOriginal('slug')) {
                $this->publication->slug        = $this->generateSlug($this->publication->slug);
            }

            $newContent                     = json_encode($newContent, JSON_UNESCAPED_UNICODE);
            $this->publication->content     = $newContent;
            $this->uploadImagesToS3();
            $this->deleteImages($this->imagesToDelete);
            $this->publication->save();

            if ($slugChanged) {
                RedirectionController::redirection($originalSlug, $this->publication->slug, $this->publication);
            }

            return redirect()->route('record', ['account' => $this->account->nickname, 'slug' => $this->publication->slug]);
        } catch (\Throwable $th) {
            session()->flash('error', $th->getMessage());
            $this->alertModal = true;
            $this->setImageCollections();
            $this->dispatchBrowserEvent('open-modal', 'alert');
            Log::error($th);
        }
    }

    public function uploadImagesToS3()
    {
        foreach ($this->imagesToUploadInS3 as $key => $value) {
            $value['image']->storeAs('projects/originals', $value['name'], 'public');
            $image  = $value['image']->temporaryUrl();
            $width  = Intervention::getImageSize($image)['width'];
            $height = Intervention::getImageSize($image)['height'];

            if ($value['logo']) {

                if ($width > $height) {
                    $heightPublication      = Constant::SIZES['two_logos']['publication']['height'];
                    $heightCard             = Constant::SIZES['two_logos']['card']['height'];
                    $resizedImageProject    = Intervention::resizeImage($image, null, $heightPublication);
                    $resizedImageCard       = Intervention::resizeImage($image, null, $heightCard);
                } else {
                    $widthPublication       = Constant::SIZES['two_logos']['publication']['width'];
                    $widthCard              = Constant::SIZES['two_logos']['card']['width'];
                    $resizedImageProject    = Intervention::resizeImage($image, $widthPublication, null);
                    $resizedImageCard       = Intervention::resizeImage($image, $widthCard, null);
                }

                Storage::disk('public')->put('projects/' . $value['name'], $resizedImageProject);
                Storage::disk('public')->put('projects/thumb/' . $value['name'], $resizedImageCard);
            } else {
                $standardWidth  = $value['width'];
                $standardHeight = $value['height'];

                if ($width > $height) {
                    $resizedImage = Intervention::resizeImage($image, null, $standardHeight);
                } else {
                    $resizedImage = Intervention::resizeImage($image, $standardWidth, null);
                }
                Storage::disk('public')->put('projects/' . $value['name'], $resizedImage);
            }
        }
    }

    public function downloadExample()
    {
        $file = asset('Plantillas PSD JPG proyectos Unmarked.zip');
        return redirect($file);
    }

    /**
     * Generate slug
     *
     * agency/brand+subtitle
     * if exixsts agency/brand+subtitle+randomnumber
     *
     * @return string
     */
    public function generateSlug($text = null)
    {
        $i = 0;

        do {
            if ($text != null) {
                $slug = $text;
            } else {
                $slug = $this->publication->brand . '-' . $this->publication->subtitle;
            }

            $slug = str($slug)->slug(language: 'es');
            $slug = strtolower($slug);

            $slugExists = Publication::where('slug', $slug)->first();

            if ($slugExists) {
                $slug = $slug . '-' . rand(0, 100);
            }
            $i++;
        } while ($slugExists && $i < 100);

        return $slug;
    }

    public function setImageCollections()
    {
        foreach ($this->content as $key => $value) {
            $type = $value['type'];
            if ($type == 'image') {
                $images = $value['value'];
                foreach ($images as $key2 => $value2) {
                    foreach ($this->imagesToUploadInS3 as $key3 => $value3) {
                        if ($value2 == $value3['name']) {
                            $this->content[$key]['value'][$key2] = $value3['image'];
                        }
                    }
                }
            }
        }
    }

    public function handleSortItems($orders)
    {
        $contentCopy = [];
        foreach ($orders as $key => $order) {
            $i = 0;
            foreach ($this->contentCopy as $key2 => $value) {

                if ($key == $i) {
                    $contentCopy[$order['value']] = $this->contentCopy[$order['value']];
                }
                $i++;
            }
        }

        $this->contentCopy = $contentCopy;
    }

    public function changeOrder()
    {
        $this->content          = $this->contentCopy;
        $this->filepondImages   = [];

        foreach ($this->contentCopy as $key => $item) {

            if ($item['type'] == 'image') {

                if ($this->creatingProject) {
                    $images = $item['value'];
                } else {
                    $images = $item['new_urls'];
                }

                foreach ($images as $key2 => $image) {

                    if ($image != null) {
                        $this->filepondImages[$key][$key2]      = $image->temporaryUrl();
                    }
                }
            }
        }

        $textContent = [];
        foreach ($this->contentCopy as $key => $value) {

            if ($value['type'] == 'text') {
                $textContent[$key] = $value;
            }
        }

        $this->dispatchBrowserEvent('reorder-trix-content', ['content' => $textContent]);
    }

    public function resetOrder()
    {
        $this->contentCopy = $this->content;
    }
}
