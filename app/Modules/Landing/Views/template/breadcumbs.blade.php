<!-- Breadcrumbs -->
<section class="breadcrumbs"
style="background-image: url({{ assets_front . 'images/background/wall-dark.jpg' }}); background-repeat: repeat; background-size: auto;">
<div class="container">
    <div class="row">
        <div class="col-12">
            {{-- <h2><i class="fa fa-pencil"></i>{{$label}}</h2> --}}
            <ul>
                <li><a href="{{ base_url('landing/home') }}"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="javascript:void(0)"><i class="fa fa-clone"></i>{{$group}}</a></li>
                <li class="active"><a href="javascript:void(0)"><i class="fa fa-clone"></i>{{$label}}</a></li>
            </ul>
        </div>
    </div>
</div>
</section>
<!--/ End Breadcrumbs -->