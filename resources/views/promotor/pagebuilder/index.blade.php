@extends('promotor.pagebuilder.layouts.app')

@push('css')
<link rel="stylesheet" href="//unpkg.com/grapesjs/dist/css/grapes.min.css">
@endpush

@section('content')
<div id="gjs">
    <h1>Hello World Component!</h1>
  </div>
@endsection
@push('script')
<script src="//unpkg.com/grapesjs"></script>
<script>
const editor = grapesjs.init({
  // Indicate where to init the editor. You can also pass an HTMLElement
  container: '#gjs',
  // Get the content for the canvas directly from the element
  // As an alternative we could use: `components: '<h1>Hello World Component!</h1>'`,
  fromElement: true,
  // Size of the editor
  height: '300px',
  width: 'auto',
  // Disable the storage manager for the moment
  storageManager: false,
  // Avoid any default panel
  panels: { defaults: [] },
});
</script>
@endpush
