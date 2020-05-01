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
 background: #2A3D68!important;

}
.gjs-cv-canvas {
    background-color: rgba(0,0,0,0.15);
    box-sizing: border-box;
    width: 82%;
}
.gjs-sm-header ,.gjs-trt-header {
    color: #fff;
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
    color: #fff!important
}
.gjs-blocks-c{
    background: #1F2E50
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
    background: #00588F;
    color: #fff;
    }
.gjs-category-title, .gjs-sm-sector .gjs-sm-title, .gjs-clm-tags .gjs-sm-title, .gjs-block-category .gjs-title, .gjs-layer-title {
    font-weight: lighter;
    color: #FFFFFF!important;
    font-size: 12px;
    background-color: #1F2E50;
    letter-spacing: 1px;
    padding: 9px 10px 9px 20px;
    border-bottom: 1px solid rgba(277,277,277,0.1);
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
    padding: 10px 5px;
    background: transparent!important;
}
.gjs-clm-header-label{
    color: #fff;
    font-size: 14px
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
    background: #00588F!important;
    z-index: 0;
    padding: 6px;
    border-radius: .24rem;
    color: #fff!important;
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
.gjs-frame{
    margin-top: 9px;
}

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
            'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'
          ]
        },
        styleManager: {
          sectors: [{
              name: 'General',
              open: false,
              buildProps: ['float', 'display', 'position', 'top', 'right', 'left', 'bottom']
            },{
              name: 'Dimension',
              open: false,
              buildProps: ['width', 'flex-width', 'height', 'max-width', 'min-height', 'margin', 'padding'],
              properties: [{
                id: 'flex-width',
                type: 'integer',
                name: 'Width',
                units: ['px', '%'],
                property: 'flex-basis',
                toRequire: 1,
              }]
          },{
            name: 'Decorations',
            open: false,
            buildProps: ['border-radius-c', 'background-color', 'border-radius', 'border', 'box-shadow', 'background'],
          }]
        },

        plugins: ['gjs-preset-webpage','gjs-blocks-flexbox','grapesjs-style-gradient','gjs-blocks-basic'],
        pluginsOpts: {
          'gjs-preset-webpage': {}
        },
        pluginsOpts: {
            'gjs-blocks-flexbox': {
            // options
            },
        },
        pluginsOpts: {
            "gjs-blocks-basic": {
            /* ...options */
            }
        },

        // pluginsOpts: {
        //   'grapesjs-plugin-bootstrap': {
        //     // addBasicStyle: true
        //   }
        // },

//         pluginsOpts: {
//             'grapesjs-style-gradient': {
//               colorPicker: 'default',
//               grapickOpts: {
//                 min: 1,
//                 max: 99,
//               }
//             }
//           },

//         pluginsOpts: {
//           'gjs-plugin-filestack': { key: 'Ajh5qpZXWQqmcxokCAM0Zz' }
//         },
//         blockManager: {
//     appendTo: '#blocks',
//     blocks: [
//       {
//         id: 'section', // id is mandatory
//         label: '<b>Section</b>', // You can use HTML/SVG inside labels
//         attributes: { class:'gjs-block-section' },
//         content: `<section>
//           <h1>This is a simple title</h1>
//           <div>This is just a Lorem text: Lorem ipsum dolor sit amet</div>
//         </section>`,
//       }, {
//         id: 'text',
//         label: 'Text',
//         content: '<div data-gjs-type="text">Insert your text here</div>',
//       }, {
//         id: 'image',
//         label: 'Image',
//         // Select the component once it's dropped
//         select: true,
//         // You can pass components as a JSON instead of a simple HTML string,
//         // in this case we also use a defined component type `image`
//         content: { type: 'image' },
//         // This triggers `active` event on dropped components and the `image`
//         // reacts by opening the AssetManager
//         activate: true,
//       }
//     ]
//   },
//   // We define a default panel as a sidebar to contain layers
  assetManager: {
    stylePrefix: 'am-',
    upload: base_url+'/ajaxassets',        //for temporary storage
    uploadName: 'files',
    uploadFile:'',
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
editor.on('asset:upload:end', () => {
    getImage()
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

// $.get(base_url+'/admins/grapesjs/temp-1/css/styles.css',(res) => {
//     editor.setStyle(res);
//     // console.log(res)
// })

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
var blockManager = editor.BlockManager;

// 'my-first-block' is the ID of the block
blockManager.add('my-first-block', {
  label: 'Simple block',
  content: '<div class="my-block">This is a simple block</div>',
});
blockManager.add('the-column-block', {
  label: '2 Columns',
  content: '<div class="container"><div class="row" data-gjs-droppable=".row-cell" data-gjs-custom-name="Row">' +
      '<div class="cell col-md-6" >Col-6</div>' +
      '<div class="cell col-md-6" >Col-6</div>' +
    '</div></div>',
});

editor.StyleManager.addProperty('Decorations', {
name: 'Gradient',
property: 'background-image',
type: 'gradient',
defaults: 'none'
});

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

</script>
@endpush
