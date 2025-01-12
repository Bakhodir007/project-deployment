@php
    /**
    * @var \Core\Support\Utilities\BreadcrumbUtility\Breadcrumb $breadcrumb
    */
@endphp
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ "/" }}"><i class="tf-icons ti ti-smart-home"></i></a>
        </li>
        @foreach($breadcrumbs as $breadcrumb)
            @if(isset($breadcrumb->url))
                <li class="breadcrumb-item">
                    <a href="{{ $breadcrumb->url }}">
                        {{ $breadcrumb->title }}
                    </a>
                </li>
            @else
                <li class="breadcrumb-item active text-muted">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ol>
</nav>
