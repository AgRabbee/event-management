<div class="modal fade" id="event-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content min-vh-50" id="event-edit-modal"></div>
        <div class="overlay" id="modal_overlay">
            <i class="fas fa-2x fa-sync-alt fa-spin text-olive"></i>
        </div>
    </div>
</div>

{{--<div class="modal fade" id="event-create-modal">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create Event</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="event-store-form">
                    <div class="row">
                        --}}{{-- Event Name --}}{{--
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                                <span id="name_error" style="display: block" class="invalid-feedback" role="alert"></span>
                            </div>
                        </div>

                        --}}{{-- Event Short Description --}}{{--
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="short_desc">Short Description<span class="text-danger">*</span></label>
                                <textarea name="short_desc" class="form-control short-textarea no-resize"  id="short_desc" cols="30" rows="1"></textarea>
                                <span id="short_desc_error" style="display: block" class="invalid-feedback" role="alert"></span>
                            </div>
                        </div>

                        --}}{{-- Event Long Description --}}{{--
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="long_desc">Description<span class="text-danger">*</span></label>
                                <textarea name="long_desc" class="form-control textarea"  id="long_desc" cols="30" rows="3"></textarea>
                                <span id="long_desc_error" style="display: block" class="invalid-feedback" role="alert"></span>
                            </div>
                        </div>

                        --}}{{-- Event From --}}{{--
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="event_from">Event From<span class="text-danger">*</span></label>
                                <div class="input-group date date-selection" id="event_from" data-target-input="nearest">
                                    <input type="text" name="event_from" class="form-control datetimepicker-input" data-target="#event_from">
                                    <div class="input-group-append" data-target="#event_from" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                <span id="event_from_error" style="display: block" class="invalid-feedback" role="alert"></span>
                            </div>
                        </div>

                        --}}{{-- Event To --}}{{--
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="event_to">Event To<span class="text-danger">*</span></label>
                                <div class="input-group date date-selection" id="event_to" data-target-input="nearest">
                                    <input type="text" name="event_to" class="form-control datetimepicker-input" data-target="#event_to">
                                    <div class="input-group-append" data-target="#event_to" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                                <span id="event_to_error" style="display: block" class="invalid-feedback" role="alert"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="event-store-btn">Save</button>
            </div>
        </div>
    </div>
</div>--}}
