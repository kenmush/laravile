<div id="danger-alert-modal" class="modal fade hide" tabindex="-1" role="dialog" aria-modal="true" style="padding-right: 17px; display: block;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content modal-filled bg-white">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-wrong h1"></i>
                    <h4 class="mt-2 text-dark"><i class="fa fa-info-circle text-info" style="font-size: 46px;"></i></h4>
                    <p class="mt-3 text-dark">Are You Sure?</p>
                    <div class="d-flex">
                        <button type="button" class="btn btn-primary my-2 btn-sm mr-2 ml-auto" data-dismiss="modal">Cancel</button>
                        <form action="{{route('admin.users.destroy',$u->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm my-2 mr-auto">Continue</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
