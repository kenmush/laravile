@extends('client.pagebuilder.layouts.app')

@push('css')
<link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet">
<link href="{{asset('admins/grapesjs/grapesjs-preset-webpage.min.css')}}" rel="stylesheet">
{{-- <script src="//feather.aviary.com/imaging/v3/editor.js"></script> --}}
<script src="https://unpkg.com/grapesjs"></script>
{{-- <link href="{{asset('admins/grapesjs/grapesjs-plugin-filestack.css')}}" rel="stylesheet"/> --}}
{{-- <script src="https://unpkg.com/grapesjs"></script> --}}
<script src="{{asset('admins/grapesjs/grapesjs-preset-webpage.min.js')}}"></script>
{{-- <script src="https://static.filestackapi.com/v3/filestack-0.1.10.js"></script> --}}
{{-- <script src="{{asset('admins/grapesjs/grapesjs-plugin-filestack.min.js')}}"></script> --}}
<script src="https://unpkg.com/grapesjs-blocks-basic"></script>
<link href="https://unpkg.com/grapick/dist/grapick.min.css" rel="stylesheet">
<script src="{{asset('admins/grapesjs/script.js')}}"></script>
{{-- <script src="https://unpkg.com/grapesjs-style-gradient"></script> --}}
{{-- <script src="https://unpkg.com/grapesjs-blocks-flexbox"></script> --}}
<!--GrapesJs Mjml-->
<script src="https://cdn.jsdelivr.net/npm/grapesjs-mjml@0.0.31/dist/grapesjs-mjml.min.js"></script>
<script src="{{asset('admins/grapesjs/grapesjs-blocks-basic.min.js')}}"></script>
{{-- <script src="{{asset('admins/grapesjs/ckeditor/ckeditor.js')}}"></script> --}}
<script src="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.9.2/ckeditor.js"></script> --}}
<script src="https://unpkg.com/grapesjs-tui-image-editor"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.2/tinymce.min.js"></script> --}}
{{-- <script src="{{asset('admins/grapesjs/ckeditor/ckeditor.js')}}"></script> --}}
{{-- <script src="{{asset('admins/grapesjs/grapesjs-plugin-ckeditor.min.js')}}"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/grapesjs-plugin-ckeditor@0.0.9/dist/grapesjs-plugin-ckeditor.min.js"></script> --}}

{{-- <link rel="stylesheet" href="https://unpkg.com/grapesjs-preset-newsletter/dist/grapesjs-preset-newsletter.css"> --}}
<script src="https://unpkg.com/grapesjs-preset-newsletter"></script>
<style>
    body {
        font-family: 'Montserrat', sans-serif !important
    }

    .editor-row {
        display: flex;
        justify-content: flex-start;
        align-items: stretch;
        flex-wrap: nowrap;
        height: 300px;
    }

    .gjs-rte-action {
        padding: 5px 3px;
    }

    .gjs-block {
        width: auto;
        height: auto;
        min-height: auto;
    }

    .editor-canvas {
        flex-grow: 1;
    }

    .panel__right {
        flex-basis: 230px;
        position: relative;
        overflow-y: auto;
    }

    .panel__top {
        padding: 0;
        width: 100%;
        display: flex;
        position: initial;
        justify-content: center;
        justify-content: space-between;
    }

    .panel__basic-actions {
        position: initial;
    }

    .panel {
        width: 90%;
        max-width: 700px;
        border-radius: 3px;
        padding: 30px 20px;
        margin: 150px auto 0px;
        background-color: #d983a6;
        box-shadow: 0px 3px 10px 0px rgba(0, 0, 0, 0.25);
        color: rgba(255, 255, 255, 0.75);
        font: caption;
        font-weight: 100;
    }

    .welcome {
        text-align: center;
        font-weight: 100;
        margin: 0px;
    }

    .logo {
        width: 70px;
        height: 70px;
        vertical-align: middle;
    }

    .logo path {
        pointer-events: none;
        fill: none;
        stroke-linecap: round;
        stroke-width: 7;
        stroke: #fff
    }

    .big-title {
        text-align: center;
        font-size: 3.5rem;
        margin: 15px 0;
    }

    .description {
        text-align: justify;
        font-size: 1rem;
        line-height: 1.5rem;
    }

    .dropdown-toggle::after {
        display: none
    }

    .nav-link {
        padding: 0 !important
    }

    .icon {
        cursor: pointer;
        line-height: 10px
    }

    body {
        overflow: hidden;
    }

    .gjs-pn-commands {
        background: #fff;
        height: 58px;
    }

    .gjs-pn-views-container {
        width: 22%;
        box-shadow: unset;
        background: #f4f8fa !important;

    }

    .gjs-cv-canvas {
        background-color: rgba(0, 0, 0, 0.15);
        box-sizing: border-box;
        width: 78%;
    }

    .gjs-sm-header,
    .gjs-trt-header {
        color: #00588F;
        font-weight: lighter;
        padding: 18px;
        margin-top: 12px;
        font-size: 14px;
        /* font-weight: 500 */
    }

    .gjs-pn-views {
        border-bottom: unset;
        top: 0%;
        height: 58px;
        padding: 10px 0;
    }

    .gjs-pn-options {
        background-color: #fcfcfc !important;
        height: 58px;
        padding: 14px 16px;
    }

    .fa-trash {
        margin-right: 0 !important
    }

    .gjs-clm-tag,
    #gjs-clm-add-tag,
    .gjs-clm-tags-btn {
        background: #00588F;
        color: #fff
    }

    .gjs-clm-sel-rule {
        color: #7680ac !important
    }

    .gjs-sm-sector .gjs-sm-title {
        background-color: #fff !important;
        letter-spacing: 1px;
        padding: 9px 10px 9px 20px;
    }

    .gjs-blocks-c {
        background: #F0F5FF;
        padding: 13px 5px !important
    }

    .gjs-block-categories {
        /* margin-top: 6px; */
    }

    *::-webkit-scrollbar-track {
        background: #6E7280 0% 0% no-repeat padding-box !important;
    }

    *::-webkit-scrollbar-thumb {
        background: #07090F 0% 0% no-repeat padding-box !important;
    }

    .gjs-block {
        min-height: 101px;
        border: 1px solid #E4ECFC !important;
        width: 45% !important;
        background: #fff;
        border: unset;
        color: #00588F;
        box-shadow: unset;
    }

    .gjs-rte-toolbar {
        left: unset !important
    }

    .gjs-block-label {
        margin-bottom: auto;
        margin-top: 2px;
        font-weight: 500;
        font-size: 0.8rem;
    }

    .gjs-category-title,
    .gjs-sm-sector .gjs-sm-title,
    .gjs-clm-tags .gjs-sm-title,
    .gjs-block-category .gjs-title,
    .gjs-layer-title {
        font-weight: 500;
        border: 1px solid #E4ECFC !important;
        color: #00588F !important;
        font-size: .92rem;
        background-color: #F0F5FF;
        letter-spacing: 1px;
        padding: 22px 19px 19px;
        font-family: 'Montserrat', sans-serif;
    }

    .gjs-block-category.gjs-open {
        border-bottom: 1px solid rgba(277, 277, 277, 1);
    }

    .gjs-sm-properties {
        color: #fff;
        background: #2A3D68 !important;
    }

    .gjs-radio-items {
        display: flex;
        height: 28px;
    }

    .gjs-clm-tags {
        font-size: .75rem;
        padding: 10px 10px;
        background: transparent !important;
    }

    .gjs-clm-header-label {
        color: #7680ac;
        font-size: 14px
    }

    .gjs-clm-tag,
    #gjs-clm-add-tag,
    .gjs-clm-tags-btn {
        background: #fff;
        color: #7680ac;
    }

    .gjs-pn-btn {
        margin-right: 22px
    }

    .gjs-clm-tags-btn {
        width: 28px !important;
        height: 28px !important;
        border: unset !important;
    }

    .gjs-field {
        background: #f4f4f4
    }

    .gjs-layer-count {
        position: absolute;
        right: 24px;
        top: 16px;
        font-weight: 600;
    }

    .gjs-layer-move {
        padding: 4px 10px 7px 5px;
        position: absolute;
        font-size: 14px;
        cursor: move;
        right: 32px;
        top: 11px;
    }

    .gjs-layer-title::before,
    .gjs-sm-title::before {
        border-top: 1px dashed #abd6f2;
        display: block;
        content: '';
        width: 100%;
        position: absolute;
        /* background: #66abd5; */
        top: -14px;
        left: 0
    }

    /* .gjs-layer-title::after {
        border-top: 1px dashed;
        display: block;
        content: '';
        width: 100%;
        position: absolute;
        /* background: #66abd5; */
    /* bottom: -10px; */
    /* left: 0; */
    /* }  */
    .gjs-layer-vis {
        height: auto !important;
        width: auto !important;
        right: 43px;
        left: unset !important;
        top: 17px;
        padding: 8px 8px 7px 10px;
        position: absolute;
        cursor: pointer;
        z-index: 1;
        /* transform: translateY(-50%)!important; */
    }

    .gjs-layer-caret {
        font-size: 0.5rem;
        width: 8px;
        padding: 0;
        /* cursor: pointer; */
        position: absolute;
        left: -9px;
        top: unset !important;
        opacity: .7;
    }

    .gjs-layer-name {
        padding: 11px 9px;
        /* display: inline-block; */
        box-sizing: content-box;
        overflow: hidden;
        white-space: nowrap;
        margin: 0;
        height: 19px;
    }

    .gjs-layer__t-wrapper {
        margin-top: 24px
    }

    .gjs-layer-title-c {
        background: #fff;
        width: 92%;
        margin: auto;
        margin: 28px auto;
        border-radius: .25rem;
    }

    .gjs-layer-title {
        background: #fff;
        border-radius: .25rem;
        padding: 3px 23px !important;
    }

    .gjs-two-color {
        background: #F0F5FF;
        color: #7680ac;
        /* width: 20%; */

    }

    .gjs-pn-panels .gjs-pn-panel {}

    .gjs-cv-canvas,
    .gjs-pn-commands {
        right: 0 !important;
        left: unset !important
    }

    .gjs-pn-views-container,
    .gjs-pn-views {
        left: 0 !important
    }

    .gjs-clm-tags {
        display: none
    }

    .gjs-pn-views {
        width: 22%;
        padding: 13px 25px;
    }

    .gjs-pn-options {
        background-color: #fcfcfc !important;
        border-left: .1px solid #f3f3f3;
        border-right: .1px solid #f3f3f3;
        right: 50%;
        transform: translateX(50%);
    }

    .gjs-devices-c .gjs-device-label {
        flex-grow: 2;
        text-align: left;
        margin-right: 10px;
        font-weight: 600;
        padding: 4px
    }

    .gjs-field-color-picker {
        border-radius: 0.25rem !important;
    }

    #gjs-sm-float .gjs-radio-item .gjs-radio-item-label {
        padding: 4px
    }

    #gjs-sm-position .gjs-radio-item .gjs-radio-item-label {
        padding: 4px
    }

    .gjs-field input,
    .gjs-field select,
    .gjs-field textarea {
        background: #fff;
        color: #7680ac !important;
        z-index: 0;
        padding: 6px;
        border-radius: .24rem;
        font-size: 14px;
    }

    .gjs-field-arrow-u {
        border-bottom: 4px solid #7680ac;
    }

    .gjs-field-arrow-d,
    .gjs-d-s-arrow {
        border-top: 4px solid #7680ac;
    }

    .gjs-field .gjs-d-s-arrow {
        border-top: none !important
    }

    .gjs-am-file-uploader>form #gjs-am-uploadFile {
        opacity: 0;
        filter: alpha(opacity=0);
        padding: 183px 10px;
    }

    .gjs-am-assets-cont {
        background-color: rgba(0, 0, 0, 0.1);
        border-radius: 3px;
        box-sizing: border-box;
        padding: 10px;
        width: 44%;
        height: 400px;
    }

    .gjs-one-bg {
        background-color: #fff !important;
    }

    .gjs-pn-views-container,
    .gjs-clm-tags {
        background: #f4f8fa !important
    }

    .gjs-am-assets {
        height: 100%;
    }

    .gjs-am-name {
        word-break: break-all
    }

    .gjs-am-add-asset button {
        width: 28%;
        float: right;
        background: #66abd5;
        color: #fff;
        height: 36px;
    }

    .gjs-am-assets-header {
        padding: 10px 0px;
    }

    .gjs-field-units .gjs-input-unit {
        height: 30px;
        margin-top: 1px;
    }

    .gjs-radio-item input:checked+.gjs-radio-item-label {
        background-color: #f0f5ff;
    }

    #gjs-sm-input-holder select,
    .gjs-field input,
    .gjs-radio-item-label,
    #gjs-clm-tags-field {
        color: #7680ac !important;
        border: 1px solid #c1cadb !important
    }

    .gjs-radio-item-label {
        cursor: pointer;
        background: #fff;
        display: block;
        padding: 6px;
    }

    .gjs-field input {
        background: #fff;
        color: #7680ac !important;
    }

    .gjs-sm-btn {
        color: #7680ac !important;
    }

    .gjs-trt-header,
    #gjs .gjs-sm-header,
    .gjs-device-label,
    .gjs-block-label,
    .gjs-clm-header-label,
    .gjs-sm-title {
        font-family: 'Montserrat', sans-serif;
    }

    .gjs-pn-views-container {
        height: 100%;
        padding: 58px 0 0;
    }

    #gjs-sm-extra {
        display: none !important;
    }

    .fa-navicon:before,
    .fa-reorder:before,
    .fa-bars:before,
    .fa-trash:before,
    .fa-download:before,
    .fa-repeat:before,
    .fa-rotate-left:before,
    .fa-undo:before,
    .fa-eye:before,
    .fa-arrows-alt:before,
    .fa-code:before,
    .fa-square-o:before,
    .fa-th-large:before {
        content: '';

    }

    .fa-th-large {
        transform: scale(.9);
        background: transparent url('{{asset("admins/assets/grid-45.svg")}}') 0% 0% no-repeat padding-box;
        /* background-size: contain; */
        background-position: center;
    }

    .fa-cog {
        display: none
    }

    .fa-eye {
        background: transparent url('{{asset("admins/assets/ic_remove_red_eye_48px.svg")}}') 0% 0% no-repeat padding-box;
        transform: scale(.8);
        background-size: contain;
        background-position: center;
        margin-right: 27px;
    }

    .fa-arrows-alt {
        transform: scale(.9);
        background: transparent url('{{asset("admins/assets/ic_fullscreen_36px.svg")}}') 0% 0% no-repeat padding-box;
        /* background-size: contain; */
        background-position: center;
        margin-right: 27px;
    }

    .fa-code {
        transform: scale(.85);
        background: transparent url('{{asset("admins/assets/ic_code_48px.svg")}}') 0% 0% no-repeat padding-box;
        /* background-size: contain; */
        background-position: center;
        margin-right: 27px;
    }

    .fa-square-o {
        background: transparent url('{{asset("admins/assets/ic_grid_on_24px.svg")}}') 0% 0% no-repeat padding-box;
        background-position: center;
        margin-right: 27px;
    }

    .gjs-pn-btn.gjs-pn-active {
        background-color: #f0f5ff !important
    }

    .fa-desktop {
        font-size: 17px;
        top: 2px;
        padding: 6px;
    }

    .fa-mobile {
        font-size: 24px;
        top: 1px
    }

    .fa-tablet {
        font-size: 21px;
        top: 2.8px;
    }

    .fa-undo {
        background: transparent url('{{asset("admins/assets/ic_refresh_48px.svg")}}') 0% 0% no-repeat padding-box;
        background-position: center;
        /* background-size: 18px; */
    }

    .fa-repeat {
        background: transparent url('{{asset("admins/assets/ic_refresh_48px.svg")}}') 0% 0% no-repeat padding-box;
        background-position: center;
        margin-right: 19px;
        transform: scaleX(-1);
    }

    .fa-download {
        background: transparent url('{{asset("admins/assets/file-import.svg")}}') 0% 0% no-repeat padding-box;
        background-position: center;
        margin-right: 19px;
        background-size: 19px;
    }

    .fa-trash {
        background: transparent url(http://127.0.0.1:8000/admins/assets/ic_delete_48px.svg) 0% 0% no-repeat padding-box;
        background-position: 0 4.3px;
        background-size: 31px 20px;
    }


    .fa-bars {
        background: transparent url('{{asset("admins/assets/ic_layers_48px.svg")}}') 0% 0% no-repeat padding-box;
        background-position: center;
        background-size: 19px;
    }

    .gjs-pn-btn {
        font-size: 24px !important
    }

    .fa-paint-brush {
        font-size: 20px !important
    }

    .gjs-cv-canvas {
        margin-top: 19px;
    }

    .gjs-block-category:nth-child(2),
    .gjs-block-category:nth-child(1),
    .gjs-block-category:nth-child(3) {
        /*display: none */
    }

    .gjs-title {
        word-break: break-all
    }

    .fa-map-o,
    .fa-code,
    .fa-download {
        display: none;
    }

    .fa-map-o,
    div[title="Link Block"] {
        display: none;
    }

    .tui-image-editor-container ul {
        padding: 0px 11px !important;
    }

    .gjs-sm-properties {
        border-radius: 0.25rem;
        background: rgb(255, 255, 255) !important;
        border: 1px solid #E4ECFC !important;
        color: #7680ac;
    }

    .gjs-category-open,
    .gjs-sm-sector.gjs-sm-open,
    .gjs-sm-open.gjs-clm-tags,
    .gjs-block-category.gjs-open {
        border-bottom: unset;
    }

    span.gjs-sm-icon {
        font-family: 'Montserrat', sans-serif !important;
    }

    .gjs-sm-icon {
        color: #505b89;
        ;
        font-size: 14px;
        font-weight: 500;
    }

    svg {
        width: 24px
    }

    .gjs-rte-action div {
        width: 36px !important;
    }

    [data-original-title="font"] .form-control {
        width: 80px !important
    }

    .gjs-toolbar {
        background-color: #f5a361;
        padding: 3px;
    }

    .form-control {
        width: 96px;
    }

    .gjs-rte-active {
        background: #f6f9ff;
    }

    [data-original-title="Link"] {
        padding: 0 8px 2px !important;
    }

    .gjs-sm-sector .gjs-sm-title {
        background-color: #fff !important;
        letter-spacing: 1px;
        margin: 26px 0px;
        padding: 9px 10px 9px 20px;
    }

    .gjs-rte-actionbar {
        padding: 10px 5px;
    }

    .gjs-input-unit {
        border: unset !important
    }

    .gjs-sm-sectors {
        margin: 12px;
        background-color: #f4f8fa !important;
    }

    .gjs-sm-title {
        border-radius: .25rem;
        padding: 14px 18px !important;
        border: unset;
    }

    /* #gjs-tools {
        left: unset !important
    } */

    /* .gjs-rte-active {
        filter: brightness(0.1);
        background-color: rgba(255,255,255,0.1);
    } */
    /* .gjs-blocks-c{
    display: none
} */
    /* .gjs-blocks-c:first-child{
    display: block
} */
    .sidebar-toolbar {
        width: 60px;
        background: #2c3e50;
    }

    .header {
        height: 58px;
        border-right: 1px solid#f3f3f3;
        background: #fff;
    }

    ul li {
        list-style: none;
        width: 60px;
        height: auto;
        cursor: pointer;
        text-align: center;
        position: relative;
        height: 60px;
    }

    ul {
        padding: 0
    }

    li span i {
        display: block;
        font-size: 20px;
        line-height: 30px;
        color: #fff;
        font-size: 1.3em !important
    }

    ul li p {
        color: #fff;
        font-size: 9px;
        text-transform: uppercase;
        font-weight: 800;
        letter-spacing: 1px;
        line-height: 0;
        margin-top: 14px
    }

    .fa.fa-trash:before,
    .fa.fa-arrows-alt:before,
    .fa-paint-brush,
    .fa-bars,
    .fa-th-large,
    .fa.fa-square-o:before,
    .fa.fa-repeat:before {
        display: none
    }

    .active {
        background: #f5a361;
        transition: .4s linear;
    }

    .border-bottom-c {
        border-bottom: 1px solid #455768 !important;
    }

    .back-btn {
        position: absolute;
        bottom: 0;
        background: #1b1622;
        height: 60px;
    }

    a {
        text-decoration: none
    }

    .gjs-rte-actionbar {
        width: 97px;

        flex-wrap: wrap;
    }
    .gjs-rte-action{
        border-right: none!important;
    }
    .gjs-rte-action [data-original-title='Link']{
        display: none!important;

    }
    .db-btn-designit {
        padding: 0 9px 0 22px !important;
        box-shadow: none!important;
        background-color: #4a669e!important;
    }
    .pdf {
        position: absolute;
        bottom: 59px;
        background:#fff
    }
    .pdf *{
        color: #ff0000;
    }
</style>
@endpush

@section('content')

{{-- @include('client.pagebuilder.layouts.header') --}}

<div class="container-fluid p-0 d-flex">
    <div class="sidebar-toolbar">
        <div class="header"></div>
        <ul class="">
            <li class="d-flex url active">
                <span class="m-auto">
                    <span class="d-flex"><i class="m-auto fa fa-window-maximize"></i></span>
                    <p class="mb-0">Urls</p>
                </span>
            </li>
            <li class="d-flex element">
                <span class="m-auto">
                    <span class="d-flex"><i class="m-auto fa fa-puzzle-piece"></i></span>
                    <p class="mb-0">Element</p>
                </span>
            </li>
            <li class=" d-flex layer">
                <span class="m-auto">
                    <span class="d-flex"><i class="m-auto fa fa-layer-group"></i></span>
                    <p class="mb-0">Layer</p>
                </span>
            </li>
            <li class=" d-flex pb-2 border-bottom-c style">
                <span class="m-auto">
                    <span class="d-flex"><i class="m-auto fa fa-brush"></i></span>
                    <p class="mb-0">Style</p>
                </span>
            </li>

            <li class=" d-flex">
                <span class="m-auto">
                    <div class="db-btn-design-me m-auto" data-db-doctype="landing-page"
                    data-db-unit="px" data-db-title=" " data-db-action="create">
                    </div>
                <p class="mb-0 mt-2">Images</p>
                </span>
            </li>
            <li class="d-flex pdf">
                <span class="m-auto">
                    <span class="d-flex"><i class="m-auto fa fa-file-pdf"></i></span>
                    <p class="mb-0">pdf</p>
                </span>
            </li>
            <li class="back-btn">
                <a href="{{url('/')}}" class="d-flex h-100"><span class="m-auto">
                        <span class="d-flex"><i class="m-auto fa fa-reply"></i></span>
                        <p class="mb-0">Back</p>
                    </span></a>
            </li>


        </ul>

    </div>
    <div id="gjs" style="overflow:hidden">

    </div>
</div>

@endsection
@push('script')

{{-- design bold integration  --}}
<script>
  (function (d, s, id) {
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) return;
         js = d.createElement(s); js.id = id;
         js.src =
    "https://sdk.designbold.com/button.js#app_id=d306bbe46e";
     fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'db-js-sdk'));
</script>
<script>
 window.DBSDK_Cfg = {
    export_mode: ['download','preview','publish'],
    export_callback: function (resultUrl, documentId, exportTarget) {
        console.log(documentId)
        $.post('{{url("ajaxassets")}}',{
            '_token': "{{csrf_token()}}",
            'url' : resultUrl
        },function(res){
            console.log(res)
        })
    }
 };
</script>


<script>
    $(function () {

        $(document).on('click', '.element', () => {
            if (!$('.fa-th-large').hasClass('gjs-pn-active')) {
                $('.fa-th-large').trigger('click');
                $('.style').removeClass('active')
                $('.url').removeClass('active')
                $('.layer').removeClass('active')
                $('.element').addClass('active')
                $('.gjs-pn-panel').animate({
                    scrollTop: $(".gjs-block-category:last-child").offset().top - 53
                }, 0);
            } else {
                $('.gjs-pn-panel').animate({
                    scrollTop: $(".gjs-block-category:last-child").offset().top - 53
                }, 0);
                $('.style').removeClass('active')
                $('.url').removeClass('active')
                $('.layer').removeClass('active')
                $('.element').addClass('active')
            }
        })

        $(document).on('click', '.style', () => {
            if (!$('.fa-paint-brush').hasClass('gjs-pn-active')) {
                $('.fa-paint-brush').trigger('click');
                $('.style').addClass('active')
                $('.url').removeClass('active')
                $('.layer').removeClass('active')
                $('.element').removeClass('active')
            }

        })

        $(document).on('click', '.url', () => {
            if (!$('.fa-th-large').hasClass('gjs-pn-active')) {
                $('.fa-th-large').trigger('click');
                $('.style').removeClass('active')
                $('.url').addClass('active')
                $('.layer').removeClass('active')
                $('.element').removeClass('active')
                $('.gjs-pn-panel').animate({
                    scrollTop: 0
                }, 20);
            } else {
                $('.gjs-pn-panel').animate({
                    scrollTop: 0
                }, 20);
                $('.style').removeClass('active')
                $('.url').addClass('active')
                $('.layer').removeClass('active')
                $('.element').removeClass('active')
            }
        })

        $(document).on('click', '.layer', () => {
            if (!$('.fa-bars').hasClass('gjs-pn-active')) {
                $('.fa-bars').trigger('click');
                $('.style').removeClass('active')
                $('.url').removeClass('active')
                $('.layer').addClass('active')
                $('.element').removeClass('active')
            }
        })

    })

    // tooltip enabel
    $('[data-toggle="tooltip"]').tooltip()
    let base_url = window.location.origin;

    const editor = grapesjs.init({
        container: '#gjs',
        fromElement: true,
        height: '100vh',
        fromElement: 1,
        // width: 'auto',

        canvas: {
            scripts: [
                'https://code.jquery.com/jquery-3.2.1.min.js',
                'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'
            ],
            styles: [
                "<link rel='stylesheet' href='{{asset('admins/grapesjs/temp-1/css/styles.css')}}'>",
                'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
                '<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"\
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">'
            ]
        },

        plugins: ['gjs-preset-webpage', 'grapesjs-tui-image-editor'],
        pluginsOpts: {
            'gjs-preset-webpage': {}
        },
        pluginsOpts: {
            'grapesjs-tui-image-editor': {

            }
        },

        styleManager: {
            sectors: [{
                name: 'Extra',
                buildProps: ['background-color', 'box-shadow']
            }]
        },
        // We define a default panel as a sidebar to contain layers
        assetManager: {
            stylePrefix: 'am-',
            upload: base_url + '/ajaxassets', //for temporary storage
            uploadName: 'files',
            uploadFile: '',
            multiUpload: true,
            params: {
                '_token': '{{csrf_token()}}'
            },
        },


        storageManager: {
            type: 'remote',
            autosave: true, // Store data automatically
            autoload: true,
            urlStore: base_url + '/ajaxcoverage/{{request()->route()->parameter("id")}}',
            urlLoad: base_url + '/ajaxcoverage/{{request()->route()->parameter("id")}}',
            params: {
                '_token': '{{csrf_token()}}'
            }, // Custom parameters to pass with the remote storage request, eg. CSRF token
            headers: {}, // Custom headers for the remote storage request
        }
    });

    CKEDITOR.dtd.$editable.a = 1;

    editor.on('load', function () {

        $('*').tooltip();
        // replace title
        $('body').find('.fa-bars').attr('data-original-title', 'Sort Manager')
        $('body').find('.fa-trash').attr('data-original-title', 'Clear Canvas')
        $('body').find('.fa-undo').attr('data-original-title', 'Undo')
        $('body').find('.fa-repeat').attr('data-original-title', 'Redo')

        $('#gjs-sm-margin').remove();
        $('#gjs-sm-padding').remove();
        $('#gjs-sm-border-radius').remove();
        $('#gjs-sm-border').remove();

        $('.gjs-pn-views-container .gjs-layer').append('<div style="font-size: 1.2rem;\
            text-align: left;\
            font-weight: 400;\
            font-family: Montserrat,sans-serif;\
            margin-top: 21px;">Sort Manager</div>')

        $('.gjs-sm-sectors').prepend('<div style="    font-size: .9rem;\
            text-align: left;\
            font-weight: 600;\
            font-family: Montserrat,sans-serif;\
            margin-top: 23px;\
            text-transform: uppercase;\
            letter-spacing: 1px;\
            color: #00588F;">Style Manager</div>')

        // $('.gjs-blocks-cs').append('<div style="font-size: .9rem;\
        //     text-align: left;\
        //     font-weight: 600;\
        //     font-family: Montserrat,sans-serif;\
        //     margin-top: 23px;\
        //     text-transform: uppercase;\
        //     letter-spacing: 1px;\
        //     color: #00588F;">Style Manager</div>')
    })

    editor.on('update', function () {
        if ($('.fa-paint-brush').hasClass('gjs-pn-active')) {
            $('.style').addClass('active');
            $('.url').removeClass('active');
            $('.element').removeClass('active');
            $('.layer').removeClass('active');
        } else {
            $('.style').removeClass('active');
        }
    })


    editor.on('rte:enable', function () {

        $('#gjs-sm-typography .gjs-sm-title').trigger('click');

        $('[data-original-title="justify"] svg').css({
            'width': '18px'
        });

        $('.gjs-rte-action[data-original-title="Link"]').hide();

        $('.gjs-rte-toolbar [data-original-title="Bold"]').html(
            '<div style="width:24px"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M15.6 10.79c.97-.67 1.65-1.77 1.65-2.79 0-2.26-1.75-4-4-4H7v14h7.04c2.09 0 3.71-1.7 3.71-3.79 0-1.52-.86-2.82-2.15-3.42zM10 6.5h3c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-3v-3zm3.5 9H10v-3h3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5z"></path></svg></div>'
            )

        $('.gjs-rte-toolbar [data-original-title="Italic"]').html(
            '<div style="width:24px"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M10 4v3h2.21l-3.42 8H6v3h8v-3h-2.21l3.42-8H18V4h-8z"></path></svg></div>'
            )

        $('.gjs-rte-toolbar [data-original-title="Underline"]').html(
            '<div style="width:24px"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M12 17c3.31 0 6-2.69 6-6V3h-2.5v8c0 1.93-1.57 3.5-3.5 3.5S8.5 12.93 8.5 11V3H6v8c0 3.31 2.69 6 6 6zm-7 2v2h14v-2H5z"></path></svg></div>'
            )

        $('.gjs-rte-toolbar [data-original-title="Strike-through"]').html(
            '<div style="width:24px"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M10 19h4v-3h-4v3zM5 4v3h5v3h4V7h5V4H5zM3 14h18v-2H3v2z"></path></svg></div>'
            )

        $('.gjs-rte-toolbar [data-original-title="Link"]').html(
            '<div style="width:24px"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M17 7h-4v2h4c1.65 0 3 1.35 3 3s-1.35 3-3 3h-4v2h4c2.76 0 5-2.24 5-5s-2.24-5-5-5zm-6 8H7c-1.65 0-3-1.35-3-3s1.35-3 3-3h4V7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h4v-2zm-3-4h8v2H8z"></path></svg></div>'
            )

    })
    // text alignment funciton
    const rte = editor.RichTextEditor;

    rte.add('left', {
        icon: '<div style="width: 24px;"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M15 15H3v2h12v-2zm0-8H3v2h12V7zM3 13h18v-2H3v2zm0 8h18v-2H3v2zM3 3v2h18V3H3z"></path></svg></div>',
        attributes: {
            title: 'left'
        },
        result: rte => {
            // let id = $(rte.el).attr('id');
            rte.exec('justifyLeft')
            $(rte.doc).find(rte.el).css({
                'text-align': 'left'
            });
            // editor.getComponents().add(`<style>#${id}{text-align:left}</style>`);
        },

    });

    rte.add('center', {
        icon: '<div style="width: 24px;"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M7 15v2h10v-2H7zm-4 6h18v-2H3v2zm0-8h18v-2H3v2zm4-6v2h10V7H7zM3 3v2h18V3H3z"></path></svg></div>',
        attributes: {
            title: 'center'
        },
        result: rte => {
            // let id = $(rte.el).attr('id');
            rte.exec('justifyCenter')
            // editor.getComponents().add(`<style>#${id}{text-align:center}</style>`);
            // console.log(rte.selection())
            $(rte.doc).find(rte.el).css({
                'text-align': 'center'
            });
        },

    });
    rte.add('right', {
        icon: '<div style="width: 24px;"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fit="" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M3 21h18v-2H3v2zm6-4h12v-2H9v2zm-6-4h18v-2H3v2zm6-4h12V7H9v2zM3 3v2h18V3H3z"></path></svg></div>',
        attributes: {
            title: 'right'
        },
        result: rte => {
            rte.exec('justifyRight');
            $(rte.doc).find(rte.el).css({
                'text-align': 'right'
            });
        },


    });

    rte.add('justify', {
        icon: '<div style="width: 18px;height: 20px;"><svg xmlns="http://www.w3.org/2000/svg"  id="Capa_1" x="0px" y="0px" viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve"><g><g>\
		<g>\
			<rect x="0" y="170.667" width="384" height="42.667"/>\
			<rect x="0" y="341.333" width="384" height="42.667"/>\
			<rect x="0" y="256" width="384" height="42.667"/>\
			<rect x="0" y="85.333" width="384" height="42.667"/>\
			<rect x="0" y="0" width="384" height="42.667"/>\
		</g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>\
        </svg>\
        </div>',
        attributes: {
            title: 'justify'
        },
        result: rte => {
            // let id = $(rte.el).attr('id');
            // editor.getComponents().add(`<style>#${id}{text-align:justify}</style>`);
            rte.exec('justifyFull');
            $(rte.doc).find(rte.el).css({
                'text-align': 'right'
            });
        },

    });

    rte.add('font', {
        icon: '<select class="form-control"><option value="Arial, Helvetica, sans-serif">Arial</option><option value="Arial Black, Gadget, sans-serif">Arial Black</option><option value="Brush Script MT, sans-serif">Brush Script MT</option><option value="Comic Sans MS, cursive, sans-serif">Comic Sans MS</option><option value="Courier New, Courier, monospace">Courier New</option><option value="Georgia, serif">Georgia</option><option value="Helvetica, serif">Helvetica</option><option value="Impact, Charcoal, sans-serif">Impact</option><option value="Lucida Sans Unicode, Lucida Grande, sans-serif">Lucida Sans Unicode</option><option value="Tahoma, Geneva, sans-serif">Tahoma</option><option value="Times New Roman, Times, serif">Times New Roman</option><option value="Trebuchet MS, Helvetica, sans-serif">Trebuchet MS</option><option value="Verdana, Geneva, sans-serif">Verdana</option></select>',
        attributes: {
            title: 'font'
        },
        result: rte => {
            let id = $(rte.el).attr('id');
            let font = $('select').val();
            editor.getComponents().add(`<style>#${id}{font-family:${font}}</style>`);
        },

    });
    rte.add('fontSize', {
        icon: `<select class="form-control">
                <option selected>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
            </select>`,
        attributes: {
            title: 'font size'
        },
        // Bind the 'result' on 'change' listener
        event: 'change',
        result: (rte, action) => rte.exec('fontSize', action.btn.firstChild.value),
        // Callback on any input change (mousedown, keydown, etc..)
        update: (rte, action) => {
            const value = rte.doc.queryCommandValue(action.name);
            if (value != 'false') { // value is a string
                action.btn.firstChild.value = value;
            }
        }
    })

    $.get(base_url + '/ajaxcoverage/{{request()->route()->parameter("id")}}', (res) => {
        if (res.html === null) {
            if (res.template !== null) {
                $.get(base_url + '/gettemplate/' + res.template, (res) => {
                    editor.setComponents(res);
                })
            }
        }
    })

    // Do something on response
    editor.on('asset:upload:response', (response) => {
        var result = response;
        editor.AssetManager.add({
            src: base_url + '/storage/' + response.file.replace('public/', ''),
            height: 100,
            width: 200,
        });
    });

    const assetManager = editor.AssetManager;
    getAssets();


    function getAssets() {
        $.get(base_url + '/ajaxassets', (res) => {
            let data = [];
            res.forEach(e => {
                data.push({
                    'type': 'image',
                    'src': base_url + '/storage/' + e.file.replace('public/', ''),
                    'height': '100',
                    'width': '100'
                });
            })
            assetManager.load({
                assets: data
            })
        })
    }

    function getImage() {
        $.get(base_url + '/ajaxassets', (res) => {
            let data = [];
            res.forEach(e => {
                data.push({
                    'type': 'image',
                    'src': base_url + '/storage/' + e.file.replace('public/', ''),
                    'height': '100',
                    'width': '100'
                });
            })
            assetManager.load({
                assets: data
            })
        })
    }


    $('.icon-save').on('click', function () {
        let base_url = window.location.origin;
        $.post(base_url + '/ajaxcoverage/{{request()->route()->parameter("id")}}', {
            "html": editor.getHtml(),
            "_token": "{{ csrf_token() }}"
        }, function () {
            console.log('success')
        })
    })


    function getHtmlAjax() {
        let base_url = window.location.origin;
        $.get(base_url + '/ajaxcoverage/{{request()->route()->parameter("id")}}', (res) => {
            editor.addComponents(res.html);
        })
    }
    editor.runCommand('sw-visibility');

    editor.on('rte:enable', function (e) {
        console.log(editor.getSelected())
        // .gjs-rte-active
    })



    // design iframe
    window.onload = function () {

        $('.gjs-sm-properties').trigger('click');

        var blockManager = editor.BlockManager;
        //   get report data for tempalte
        $.get(base_url + '/report/get/' + '{{request()->get("report_id")}}', (res) => {

            // console.log(res.metrics.no_of_coverage);
            if (res.coverages.length > 0) {
                res.coverages.forEach(resp => {
                    blockManager.add(resp.id, {
                        name: 'link-replace',
                        category: resp.url,
                        label: 'Metric',
                        content: {
                            removable: true,
                            draggable: true,
                            droppable: true,
                            // script: "console.log('the element', this)",
                            components: '<div class="bg-white container"><div class="col-md-12 p-0"><div class="row m-0">\
                <div class="col-md-3 d-flex">\
                <span class="main-stat-title my-auto">Total Coverage: </span>\
                <p data-gjs-type="text" draggable="false" data-highlightable="1" class=" my-auto main-stat-value gjs-selected" id="iozp3" style="outline: unset;">' +
                                res.metrics.no_of_coverage +
                                '</p>\
                </div>\
                <div class="col-md-3 d-flex">\
                <span class="main-stat-title my-auto ">DA: </span>\
                <p data-gjs-type="text" draggable="false" data-highlightable="1" class="my-auto main-stat-value gjs-selected" id="iozp3" style="outline: unset;">' +
                                resp.domain_authority +
                                '</p>\
                </div>\
                <div class="col-md-3 d-flex">\
                <span class="main-stat-title my-auto ">Monthly Visit: </span>\
                <p data-gjs-type="text" draggable="false" data-highlightable="1" class="my-auto main-stat-value gjs-selected" id="iozp3" style="outline: unset;">' +
                                resp.monthly_visit +
                                '</p>\
                </div>\
                <div class="col-md-3 d-flex">\
                <span class="main-stat-title my-auto ">Social Share: </span>\
                <p data-gjs-type="text" draggable="false" data-highlightable="1" class="my-auto main-stat-value gjs-selected" id="iozp3" style="outline: unset;">' +
                                res.metrics.social_share + '</p>\
                </div>\
                </div></div>',
                            traits: ['link-replace', 'name'],
                        },
                        attributes: {
                            title: 'Link Replace',
                            class: 'fa fa-bar-chart'
                        }
                    });

                    blockManager.add(resp.id + '1', {
                        name: 'link-replace',
                        category: resp.url,
                        label: 'Social Share',
                        content: {
                            removable: true,
                            draggable: true,
                            droppable: true,
                            // script: "console.log('the element', this)",
                            components: '<div class="container bg-white"><div class="col-md-12 p-0"><div class="row">\
                <div class="col-md-4 d-flex">\
                <span class="main-stat-title my-auto ">Facebook: </span>\
                <p data-gjs-type="text" draggable="false" data-highlightable="1" class=" my-auto main-stat-value gjs-selected" id="iozp3" style="outline: unset;">' +
                                resp.facebook_share +
                                '</p>\
                </div>\
                <div class="col-md-4 d-flex">\
                <span class="main-stat-title my-auto ">Twitter: </span>\
                <p data-gjs-type="text" draggable="false" data-highlightable="1" class=" my-auto main-stat-value gjs-selected" id="iozp3" style="outline: unset;">' +
                                resp.twitter_share +
                                '</p>\
                </div>\
                <div class="col-md-4 d-flex">\
                <span class="main-stat-title my-auto ">Pinterest: </span>\
                <p data-gjs-type="text" draggable="false" data-highlightable="1" class=" my-auto main-stat-value gjs-selected" id="iozp3" style="outline: unset;">' +
                                resp.pinterest_share + '</p>\
                </div>\
                </div></div>',
                            traits: ['link-replace', 'name'],
                        },
                        attributes: {
                            title: 'Link Replace',
                            class: 'fa fa-share-square'
                        }
                    });

                    blockManager.add(resp.id + '2', {
                        name: 'link-replace',
                        category: resp.url,
                        label: 'Featured Image',
                        content: {
                            removable: true,
                            draggable: true,
                            droppable: true,

                            components: '<img class="img-fluid" src="' + window.location
                                .origin + '/' + resp.screen_shot_featured + '">',
                            traits: ['link-replace', 'name'],
                        },
                        attributes: {
                            title: 'Link Replace',
                            class: 'fa fa-image'
                        }
                    });
                    blockManager.add(resp.id + '3', {
                        name: 'link-replace',
                        category: resp.url,
                        label: 'Attachment',
                        content: {
                            removable: true,
                            draggable: true,
                            droppable: true,

                            components: '<img class="img-fluid" src="' + window.location
                                .origin + '/' + resp.screen_shot_full_screen + '">',
                            traits: ['link-replace', 'name'],
                        },
                        attributes: {
                            title: 'Link Replace',
                            class: 'fa fa-clipboard'
                        }
                    });

                    blockManager.add('container-new', {
                        name: 'container-name',
                        category: 'Basic',
                        label: 'container',
                        content: {
                            components: '<div class="container p-0" style="min-height: 73px;"></div>',
                        },
                        attributes: {
                            title: 'container',
                            class: 'fa fa-border-all'
                        }
                    })

                })
            } else {
                blockManager.add('empty-block', {
                    name: 'link-replace',
                    category: 'URL',
                    label: 'No Url Found',
                    content: {
                        removable: true,
                        draggable: true,
                        droppable: true,

                        components: '<p>nothing found<p>',
                        traits: ['link-replace', 'name'],
                    },
                    attributes: {
                        title: 'Link Replace',
                        class: 'fa '
                    }
                });

            }
            blockManager.render();

            // sort custom element to top
            $('.gjs-block-category:first-child').parent().append($('.gjs-block-category:first-child'));

            // function call
            disableEditable();

            // metric icon append
            // $('div[title="Metric"]').prepend('<img data-gjs-type="image" src="{{url("/images/chart-bar.svg")}}" alt="" class="imgfluid icon-img gjs-selected" id="ie2p4" style="outline: unset;    margin: 13px auto;width: 29px;">');
        })
        editor.on('canvas:drop', function () {
            disableEditable()
        })

        function disableEditable() {

            // img responsive

            let myiFrame = document.querySelector('.gjs-frame');
            let doc = myiFrame.contentDocument;
            $(doc).find('img').attr('class', 'img-fluid');

            // $(doc).find('body *').css({'outline':'unset'});
            $(doc).find('body .contaner').css({
                'height': '110%'
            });

            //    $(doc).find('').hide();
            $(doc).find('.main-stat-value').css({
                'font-size': '21px',
                'font-weight': '600'
            })
            $(doc).find('.main-stat-title').css({
                'font-size': '14px',
                'font-weight': '500'
            })
            $(doc).find('.main-stat-value').removeAttr('contentEditable');
            $(doc).find('.indi-stat-value').removeAttr('contentEditable');
            $(doc).find('.share-count').removeAttr('contentEditable');
            $(doc).find('.indi-stat-value').click(function () {
                $(this).removeAttr('contentEditable');
            })
            $(doc).find('.indi-stat-value').dblclick(function () {
                $(this).removeAttr('contentEditable');
            });
            $(doc).find('.share-count').click(function () {
                $(this).removeAttr('contentEditable');
            })
            $(doc).find('.share-count').dblclick(function () {
                $(this).removeAttr('contentEditable');
            });
            $(doc).find('.main-stat-value').click(function () {
                $(this).removeAttr('contentEditable');
            })
            $(doc).find('.main-stat-value').dblclick(function () {
                $(this).removeAttr('contentEditable');
            });

        }

    }

</script>
@endpush
