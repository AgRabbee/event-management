<div class="modal-header">
    <h4 class="modal-title">Edit Event</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form id="event-edit-form">
        <input type="hidden" name="id" id="event-id" value="{{ $event->id }}">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="title">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control"
                           id="title" placeholder="Enter title" value="{{ old('title', $event->title) }}">
                    <span id="title_error" style="display: block" class="invalid-feedback" role="alert"></span>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary" data-update-route="{{ route('event.update', $event->id) }}" id="update-btn">Update</button>
</div>
