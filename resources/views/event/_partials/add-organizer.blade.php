<div class="row col-sm-12 col-md-12" id="organizer_{{$org_no}}">
    <div class="col-sm-12 col-md-12 d-flex justify-content-between border-top border-bottom py-2">
        <h5>Organizer {{$org_no}}</h5>
        <button class="btn btn-outline-danger ml-auto btn-sm" id="remove-organizer-btn">Remove Organizer {{$org_no}}</button>
    </div>

    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="org_name_{{$org_no}}">Organizer Name<span class="text-danger">*</span></label>
            <input type="text" name="organizer_info[{{$org_no}}][org_name]" class="form-control form-control-sm" id="org_name_{{$org_no}}" placeholder="Enter organizer name">
            @error("organizer_info.{{$org_no}}.org_name")
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="org_social_url_{{$org_no}}">Organizer Social Link<span class="text-danger">*</span></label>
            <input type="text" name="organizer_info[{{$org_no}}][org_social_url]" class="form-control form-control-sm" id="org_social_url_{{$org_no}}" placeholder="Enter organizer url">
            @error("organizer_info.{{$org_no}}.org_social_url")
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="org_social_logo_{{$org_no}}">Organizer Logo<span class="text-danger">*</span></label>
            <input type="text" name="organizer_info[{{$org_no}}][org_social_logo]" class="form-control form-control-sm" id="org_social_logo_{{$org_no}}" placeholder="Enter organizer logo url">
            @error("organizer_info.{{$org_no}}.org_social_logo")
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-sm-12 col-md-6">
        <div class="form-group">
            <label for="org_address_{{$org_no}}">Organizer Address<span class="text-danger">*</span></label>
            <input type="text" name="organizer_info[{{$org_no}}][org_address]" class="form-control form-control-sm" id="org_address_{{$org_no}}" placeholder="Enter organizer address">
            @error("organizer_info.{{$org_no}}.org_address")
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
