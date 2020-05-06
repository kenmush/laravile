@extends('client.pagebuilder.layouts.app')

@push('css')
<link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet">
<link href="{{asset('admins/grapesjs/grapesjs-preset-webpage.min.css')}}" rel="stylesheet">
<script src="//feather.aviary.com/imaging/v3/editor.js"></script>
<script src="https://unpkg.com/grapesjs"></script>
<link href="{{asset('admins/grapesjs/grapesjs-plugin-filestack.css')}}" rel="stylesheet"/>
<script src="https://unpkg.com/grapesjs"></script>
<script src="{{asset('admins/grapesjs/grapesjs-preset-webpage.min.js')}}"></script>
<script src="https://static.filestackapi.com/v3/filestack-0.1.10.js"></script>
<script src="{{asset('admins/grapesjs/grapesjs-plugin-filestack.min.js')}}"></script>
<script src="https://unpkg.com/grapesjs-blocks-basic"></script>
<link href="https://unpkg.com/grapick/dist/grapick.min.css" rel="stylesheet">
<script src="{{asset('admins/grapesjs/script.js')}}"></script>
<script src="https://unpkg.com/grapesjs-style-gradient"></script>
<script src="https://unpkg.com/grapesjs-blocks-flexbox"></script>
<script src="{{asset('admins/grapesjs/grapesjs-blocks-basic.min.js')}}"></script>
<script src="https://unpkg.com/grapesjs-tui-image-editor"></script>
<style>
.editor-row {
  display: flex;
  justify-content: flex-start;
  align-items: stretch;
  flex-wrap: nowrap;
  height: 300px;
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
    box-shadow: 0px 3px 10px 0px rgba(0,0,0,0.25);
    color:rgba(255,255,255,0.75);
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

.dropdown-toggle::after{
    display: none
}
.nav-link {
    padding: 0!important
}
.icon {
    cursor: pointer;
    line-height: 10px
}
body{
    overflow: hidden;
}
.gjs-pn-commands {
    background: #fff;
    height: 48px;
}
.gjs-pn-views-container {
    width: 18%;
 box-shadow: unset;
 background: #F0F5FF!important;

}
.gjs-cv-canvas {
    background-color: rgba(0,0,0,0.15);
    box-sizing: border-box;
    width: 82%;
}
.gjs-sm-header ,.gjs-trt-header {
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
    height: 48px;
    padding: 10px 0;
}
.gjs-pn-options {
    height: 48px;
    padding: 9px 0;
}

.gjs-clm-tag, #gjs-clm-add-tag, .gjs-clm-tags-btn  {
    background:#00588F;
    color: #fff
}
.gjs-clm-sel-rule{
    color: #7680ac!important
}

.gjs-sm-sector .gjs-sm-title{
    background-color: #fff!important;
    letter-spacing: 1px;
    padding: 9px 10px 9px 20px;
    border-bottom: 1px solid rgba(0,0,0,0.1)!important;
}
.gjs-blocks-c{
    background: #F0F5FF;
    padding: 13px 5px!important
}
.gjs-block-categories {
    margin-top: 6px;
}
*::-webkit-scrollbar-track {
    background: #6E7280 0% 0% no-repeat padding-box!important;
}
*::-webkit-scrollbar-thumb {
    background: #07090F 0% 0% no-repeat padding-box!important;
}
.gjs-block {
    width: 45%!important;
    background: #fff;
    border: unset;
    color: #00588F;
    box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;

    }
.gjs-category-title, .gjs-sm-sector .gjs-sm-title, .gjs-clm-tags .gjs-sm-title, .gjs-block-category .gjs-title, .gjs-layer-title {
    font-weight: lighter;
    color: #00588F!important;
    font-size: 12px;
    background-color: #F0F5FF;
    letter-spacing: 1px;
    padding: 9px 10px 9px 20px;
    border-bottom: 1px solid rgba(277,277,277,1);
}
.gjs-block-category.gjs-open {
    border-bottom: 1px solid rgba(277,277,277,1);
}
.gjs-sm-properties {
    color: #fff;
    background: #2A3D68!important;
}
.gjs-radio-items {
    display: flex;
    height: 28px;
}
.gjs-clm-tags {
    font-size: .75rem;
    padding: 10px 10px;
    background: transparent!important;
}
.gjs-clm-header-label{
    color: #7680ac;
    font-size: 14px
}
.gjs-clm-tag, #gjs-clm-add-tag, .gjs-clm-tags-btn {
    background: #fff;
    color: #7680ac;
}
.gjs-clm-tags-btn {
    width: 28px!important;
    height: 28px!important;
    border: unset!important;
}
.gjs-field{
    background: #E4ECFC
}
.gjs-two-color {
    background: #fff;
    color: #7680ac;
    /* width: 20%; */

}
.gjs-pn-views {
    width: 18%;
    padding: 10px 25px;
}
.gjs-pn-options {
    right: 21%;
}
.gjs-devices-c .gjs-device-label {
    flex-grow: 2;
    text-align: left;
    margin-right: 10px;
    font-weight: 600;
    padding: 4px
}
.gjs-field input, .gjs-field select, .gjs-field textarea{
    background: #00588F;
    z-index: 0;
    padding: 6px;
    border-radius: .24rem;
    color: #fff!important;
}
.gjs-am-file-uploader>form #gjs-am-uploadFile {
    opacity: 0;
    filter: alpha(opacity=0);
    padding: 183px 10px;
}
.gjs-am-assets-cont {
    background-color: rgba(0,0,0,0.1);
    border-radius: 3px;
    box-sizing: border-box;
    padding: 10px;
    width: 44%;
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
.gjs-field input {
    background:#E4ECFC
}
.gjs-trt-header,#gjs .gjs-sm-header ,.gjs-device-label,.gjs-block-label,.gjs-clm-header-label,.gjs-sm-title {
    font-family: 'Montserrat',sans-serif;
}
.gjs-pn-views-container {
    height: 100%;
    padding: 48px 0 0;
}
.fa-navicon:before, .fa-reorder:before, .fa-bars:before ,.fa-trash:before,.fa-download:before,.fa-repeat:before ,.fa-rotate-left:before, .fa-undo:before ,.fa-eye:before, .fa-arrows-alt:before,.fa-code:before, .fa-square-o:before, .fa-th-large:before  {
    content: '';

}
.fa-th-large{
    transform: scale(.8);
    background: transparent url('{{asset("admins/assets/grid-45.svg")}}') 0% 0% no-repeat padding-box;
    /* background-size: contain; */
    background-position: center;
    margin-right: 19px;
}
.fa-eye{
    background: transparent url('{{asset("admins/assets/ic_remove_red_eye_48px.svg")}}') 0% 0% no-repeat padding-box;
    transform: scale(.7);
    background-size: contain;
    background-position: center;
    margin-right: 19px;
}.fa-arrows-alt{
    transform: scale(.7);
    background: transparent url('{{asset("admins/assets/ic_fullscreen_36px.svg")}}') 0% 0% no-repeat padding-box;
    /* background-size: contain; */
    background-position: center;
    margin-right: 19px;
}

.fa-code{
    transform: scale(.75);
    background: transparent url('{{asset("admins/assets/ic_code_48px.svg")}}') 0% 0% no-repeat padding-box;
    /* background-size: contain; */
    background-position: center;
    margin-right: 19px;
}
.fa-square-o{
    transform: scale(.84);
    background: transparent url('{{asset("admins/assets/ic_grid_on_24px.svg")}}') 0% 0% no-repeat padding-box;
    background-position: center;
    margin-right: 19px;
}
.gjs-pn-btn.gjs-pn-active {
    background-color: #f0f5ff!important
}

.fa-desktop{
    font-size: 17px;
    top: 2px;
    padding: 6px;
}
.fa-mobile{
    font-size: 24px;
    top: 1px
}
.fa-tablet{
    font-size: 21px;
    top: 2.8px;
}
.fa-undo{
    background: transparent url('{{asset("admins/assets/ic_refresh_48px.svg")}}') 0% 0% no-repeat padding-box;
    background-position: center;
    background-size: 15px;
    margin-right: 19px;
}
.fa-repeat{
    background: transparent url('{{asset("admins/assets/ic_refresh_48px.svg")}}') 0% 0% no-repeat padding-box;
    background-position: center;
    margin-right: 19px;
    transform: scaleX(-1 );
    background-size: 15px;
}
.gjs-sm-icon {
    color: #fff
}
.fa-download{
    background: transparent url('{{asset("admins/assets/file-import.svg")}}') 0% 0% no-repeat padding-box;
    background-position: center;
    margin-right: 19px;
    background-size: 17px;
}
.fa-trash{
    background: transparent url('{{asset("admins/assets/ic_delete_48px.svg")}}') 0% 0% no-repeat padding-box;
    background-position: center;
    background-size: 13px;
}
.fa-bars{
    background: transparent url('{{asset("admins/assets/ic_layers_48px.svg")}}') 0% 0% no-repeat padding-box;
    background-position: center;
    background-size: 16px;
}
.gjs-cv-canvas{
    margin-top: 8px;
}

.gjs-block-category:nth-child(2),.gjs-block-category:nth-child(1), .gjs-block-category:nth-child(3){
    display: none
}
.gjs-title{
    word-break: break-all
}

.fa-map-o, .fa-code, .fa-download{
    display: none;
}
.fa-map-o, div[title="Link Block"]{
    display: none;
}
.tui-image-editor-container ul{
    padding: 0px 11px!important;
}
/* .gjs-blocks-c{
    display: none
} */
/* .gjs-blocks-c:first-child{
    display: block
} */
</style>
@endpush

@section('content')

{{-- @include('client.pagebuilder.layouts.header') --}}


<div class="container-fluid p-0">
    <div id="gjs" style="overflow:hidden">

    </div>
</div>


@endsection
@push('script')

<script>

  let base_url = window.location.origin;
  const editor = grapesjs.init({
        container: '#gjs',
        fromElement: true,
        height: '100vh',
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

        plugins: ['gjs-preset-webpage','grapesjs-tui-image-editor'],
        pluginsOpts: {
          'gjs-preset-webpage': {}
        },
      pluginsOpts: {
        'grapesjs-tui-image-editor': {

        }
      },


//   // We define a default panel as a sidebar to contain layers
  assetManager: {
    stylePrefix: 'am-',
    upload: base_url+'/ajaxassets',        //for temporary storage
    uploadName: 'files',
    uploadFile:'',
    multiUpload: true,
    params: {'_token':'{{csrf_token()}}'},
  },


  storageManager: {
      type: 'remote',
      autosave: true,         // Store data automatically
      autoload: true,
      urlStore: base_url+'/ajaxcoverage/{{request()->route()->parameter("id")}}',
      urlLoad: base_url+'/ajaxcoverage/{{request()->route()->parameter("id")}}',
      params: {'_token':'{{csrf_token()}}'}, // Custom parameters to pass with the remote storage request, eg. CSRF token
      headers: {}, // Custom headers for the remote storage request
    }
});

$.get(base_url+'/ajaxcoverage/{{request()->route()->parameter("id")}}',(res) => {
    if(res.html === null){
        if(res.template !== ''){
            $.get(base_url+'/gettemplate/'+ res.template,(res) => {
                editor.setComponents(res);
            })
        }
    }
})

// Do something on response
editor.on('asset:upload:response', (response) => {
  var result = response;
  editor.AssetManager.add({src:base_url+'/storage/'+ response.file.replace('public/',''),  height: 100,
      width: 200,});
});

const assetManager = editor.AssetManager;
getAssets();


function getAssets(){
    $.get(base_url + '/ajaxassets',(res) => {
        let data = [];
        res.forEach( e => {
            data.push({'type':'image','src':base_url+'/storage/'+ e.file.replace('public/',''),'height':'100','width':'100'});
        })
        assetManager.load({
            assets: data
        })
    })
}

function getImage(){
    $.get(base_url + '/ajaxassets',(res) => {
        let data = [];
        res.forEach( e => {
            data.push({'type':'image','src':base_url+'/storage/'+ e.file.replace('public/',''),'height':'100','width':'100'});
        })
        assetManager.load({
            assets: data
        })
    })
}


$('.icon-save').on('click',function(){
    let base_url = window.location.origin;
    $.post(base_url+'/ajaxcoverage/{{request()->route()->parameter("id")}}',{
        "html" : editor.getHtml(),
        "_token": "{{ csrf_token() }}"
    },function(){
        console.log('success')
    })
})


function getHtmlAjax(){
    let base_url = window.location.origin;
    $.get(base_url+'/ajaxcoverage/{{request()->route()->parameter("id")}}',(res) => {
        editor.addComponents(res.html);
    })
}
editor.runCommand('sw-visibility');


// design iframe
window.onload = function() {

//   get metrics for tempalte
  $.get('{{url("/metric/get")}}', (res)=> {
        // console.log(res.metrics.no_of_coverage);

        var blockManager = editor.BlockManager;

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
                components: '<div class="container bg-white"><div class="col-md-12"><div class="row">\
                <div class="col-md-3 d-flex">\
                <span class="main-stat-title my-auto">Total Coverage: </span>\
                <p data-gjs-type="text" draggable="false" data-highlightable="1" class=" my-auto main-stat-value gjs-selected" id="iozp3" style="outline: unset;">'+res.metrics.no_of_coverage+'</p>\
                </div>\
                <div class="col-md-3 d-flex">\
                <span class="main-stat-title my-auto ">DA: </span>\
                <p data-gjs-type="text" draggable="false" data-highlightable="1" class="my-auto main-stat-value gjs-selected" id="iozp3" style="outline: unset;">'+resp.domain_authority+'</p>\
                </div>\
                <div class="col-md-3 d-flex">\
                <span class="main-stat-title my-auto ">Monthly Visit: </span>\
                <p data-gjs-type="text" draggable="false" data-highlightable="1" class="my-auto main-stat-value gjs-selected" id="iozp3" style="outline: unset;">'+resp.monthly_visit+'</p>\
                </div>\
                <div class="col-md-3 d-flex">\
                <span class="main-stat-title my-auto ">Social Share: </span>\
                <p data-gjs-type="text" draggable="false" data-highlightable="1" class="my-auto main-stat-value gjs-selected" id="iozp3" style="outline: unset;">'+res.metrics.social_share+'</p>\
                </div>\
                </div></div>',
                traits: ['link-replace','name'],
            },
            attributes: {
                title: 'Link Replace',
                class: 'fa fa-bar-chart'
            }
            });

            blockManager.add(resp.id+'1', {
            name: 'link-replace',
            category: resp.url,
            label: 'Social Share',
            content: {
                removable: true,
                draggable: true,
                droppable: true,
                // script: "console.log('the element', this)",
                components: '<div class="container bg-white"><div class="col-md-12"><div class="row">\
                <div class="col-md-4 d-flex">\
                <span class="main-stat-title my-auto ">Facebook: </span>\
                <p data-gjs-type="text" draggable="false" data-highlightable="1" class=" my-auto main-stat-value gjs-selected" id="iozp3" style="outline: unset;">'+resp.facebook_share+'</p>\
                </div>\
                <div class="col-md-4 d-flex">\
                <span class="main-stat-title my-auto ">Twitter: </span>\
                <p data-gjs-type="text" draggable="false" data-highlightable="1" class=" my-auto main-stat-value gjs-selected" id="iozp3" style="outline: unset;">'+resp.twitter_share+'</p>\
                </div>\
                <div class="col-md-4 d-flex">\
                <span class="main-stat-title my-auto ">Pinterest: </span>\
                <p data-gjs-type="text" draggable="false" data-highlightable="1" class=" my-auto main-stat-value gjs-selected" id="iozp3" style="outline: unset;">'+resp.pinterest_share+'</p>\
                </div>\
                </div></div>',
                traits: ['link-replace','name'],
            },
            attributes: {
                title: 'Link Replace',
                class: 'fa fa-share-alt'
            }
            });

            blockManager.add(resp.id+'2', {
            name: 'link-replace',
            category: resp.url,
            label: 'Featured Image',
            content: {
                removable: true,
                draggable: true,
                droppable: true,

                components: '<img class="img-fluid" src="'+window.location.origin+'/'+resp.screen_shot_featured+'">',
                traits: ['link-replace','name'],
            },
            attributes: {
                title: 'Link Replace',
                class: 'fa fa-image'
            }
            });
            blockManager.add(resp.id+'3', {
            name: 'link-replace',
            category: resp.url,
            label: 'Attachment',
            content: {
                removable: true,
                draggable: true,
                droppable: true,

                components: '<img class="img-fluid" src="'+window.location.origin+'/'+resp.screen_shot_full_screen+'">',
                traits: ['link-replace','name'],
            },
            attributes: {
                title: 'Link Replace',
                class: 'fa fa-paperclip'
            }
            });

        })

        blockManager.render();

        // sort custom element to top
        $('.gjs-block-category:first-child').parent().append($('.gjs-block-category:first-child'));

        // function call
        disableEditable();

        // metric icon append
        // $('div[title="Metric"]').prepend('<img data-gjs-type="image" src="{{url("/images/chart-bar.svg")}}" alt="" class="imgfluid icon-img gjs-selected" id="ie2p4" style="outline: unset;    margin: 13px auto;width: 29px;">');
  })
    editor.on('canvas:drop', function(){
        disableEditable()
    })

    function disableEditable(){

    // img responsive

    let myiFrame = document.querySelector('.gjs-frame');
    let doc = myiFrame.contentDocument;
    $(doc).find('img').attr('class','img-fluid');
    console.log($(doc).find('img'))
    $(doc).find('body *').css({'outline':'unset'});
    $(doc).find('body .contaner').css({'height':'110%'});

    //    $(doc).find('').hide();
    $(doc).find('.main-stat-value').css({'font-size':'21px','font-weight':'600'})
    $(doc).find('.main-stat-title').css({'font-size':'14px','font-weight':'500'})
    $(doc).find('.main-stat-value').removeAttr('contentEditable');
    $(doc).find('.indi-stat-value').removeAttr('contentEditable');
    $(doc).find('.share-count').removeAttr('contentEditable');
    $(doc).find('.indi-stat-value').click(function(){
        $(this).removeAttr('contentEditable');
    })
    $(doc).find('.indi-stat-value').dblclick(function() {
        $(this).removeAttr('contentEditable');
    });
    $(doc).find('.share-count').click(function(){
        $(this).removeAttr('contentEditable');
    })
    $(doc).find('.share-count').dblclick(function() {
        $(this).removeAttr('contentEditable');
    });
    $(doc).find('.main-stat-value').click(function(){
        $(this).removeAttr('contentEditable');
    })
    $(doc).find('.main-stat-value').dblclick(function() {
        $(this).removeAttr('contentEditable');
    });
    $('body').find('.fa-bars').attr('title','Sort Manager')

}

}



</script>
@endpush
