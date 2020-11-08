<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $slot }}</h1>
            </div>
            <x-breadcrumbd :title="$title" :subtitle="$subtitle" />
        </div>
    </div> <!-- /.container-fluid -->
</section>
