@extends('promotor.pagebuilder.layouts.app')

@push('css')
<link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet"/>
<script src="https://unpkg.com/grapesjs"></script>
<script src="{{asset('admins/grapesjs/script.js')}}"></script>
<script src="https://unpkg.com/<%= rName %>"></script>
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
</style>
@endpush

@section('content')
<div class="panel__top">
    <div class="panel__basic-actions"></div>
</div>

<div id="gjs">

</div>

@endsection
@push('script')

<script>
    const editor = grapesjs.init({
        container: '#gjs',
        fromElement: true,
        height: '100vh',
        width: 'auto',
        // Disable the storage manager for the moment
        storageManager: false,
        plugins: ['<%= rName %>'],
        pluginsOpts: {
        '<%= rName %>': { /* options */ }
        },
        canvas: {
          scripts: [
            'https://code.jquery.com/jquery-3.2.1.min.js',
            'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'
          ],
          styles: [
            'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'
          ]
        },

        plugins: ['grapesjs-plugin-bootstrap'],
        pluginsOpts: {
          'grapesjs-plugin-bootstrap': {
            addBasicStyle: true
          }
        },

        blockManager: {
    appendTo: '#blocks',
    blocks: [
      {
        id: 'section', // id is mandatory
        label: '<b>Section</b>', // You can use HTML/SVG inside labels
        attributes: { class:'gjs-block-section' },
        content: `<section>
          <h1>This is a simple title</h1>
          <div>This is just a Lorem text: Lorem ipsum dolor sit amet</div>
        </section>`,
      }, {
        id: 'text',
        label: 'Text',
        content: '<div data-gjs-type="text">Insert your text here</div>',
      }, {
        id: 'image',
        label: 'Image',
        // Select the component once it's dropped
        select: true,
        // You can pass components as a JSON instead of a simple HTML string,
        // in this case we also use a defined component type `image`
        content: { type: 'image' },
        // This triggers `active` event on dropped components and the `image`
        // reacts by opening the AssetManager
        activate: true,
      }
    ]
  },
  // We define a default panel as a sidebar to contain layers
});

editor.addComponents("<div class='container'>\
  <div class='row'>\
    <div class='cell col-md-6'>Col-6\
      <h1>Insert your header text here\
      </h1>\
    </div>\
    <div class='cell col-md-6'>Col-6\
      <h1>Insert your header text here\
      </h1>\
    </div>\
  </div>\
</div>")
editor.Panels.addPanel({
  id: 'panel-top',
  el: '.panel__top',
});
editor.Panels.addPanel({
  id: 'basic-actions',
  el: '.panel__basic-actions',
  buttons: [
    {
      id: 'visibility',
      active: true, // active by default
      className: 'btn-toggle-borders',
      label: '<u>B</u>',
      command: 'sw-visibility', // Built-in command
    }, {
      id: 'export',
      className: 'btn-open-export',
      label: 'Exp',
      command: 'export-template',
      context: 'export-template', // For grouping context of buttons from the same panel
    }, {
      id: 'show-json',
      className: 'btn-show-json',
      label: 'JSON',
      context: 'show-json',
      command(editor) {
        editor.Modal.setTitle('Components JSON')
          .setContent(`<textarea style="width:100%; height: 250px;">
            ${JSON.stringify(editor.getComponents())}
          </textarea>`)
          .open();
      },
    }
  ],
});

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

blockManager.render();
// });
</script>
@endpush
