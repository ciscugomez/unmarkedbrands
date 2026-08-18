import './bootstrap';

import Alpine from 'alpinejs';
import * as FilePond from 'filepond';
import Trix from 'trix';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type'
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
import FilePondPluginImageValidateSize from 'filepond-plugin-image-validate-size';
import '@nextapps-be/livewire-sortablejs';

window.Alpine = Alpine;
window.FilePond = FilePond;

document.addEventListener('trix-file-accept', function (event) {
    event.preventDefault();
});

FilePond.registerPlugin(FilePondPluginFileValidateType, FilePondPluginImagePreview, FilePondPluginFileValidateSize, FilePondPluginImageValidateSize);

Alpine.start();
