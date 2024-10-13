<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $headerContent ?? 'Blank' }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a
                                href="{{url()->current() ?? '#'}}">{{ $dynamicContent ?? 'Blank' }}</a></li>
                    <li class="breadcrumb-item active">{{ $pageName ?? 'Blank Page' }}</li>
                </ol>
            </div>
        </div>
    </div>
</section>
