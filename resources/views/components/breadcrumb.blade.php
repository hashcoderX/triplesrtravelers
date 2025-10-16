@if(isset($seo) && method_exists($seo, 'breadcrumbs') && count($seo->breadcrumbs) > 0)
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <ol class="breadcrumb">
        @foreach($seo->breadcrumbs as $index => $breadcrumb)
            @if($loop->last)
                <li class="breadcrumb-item active" aria-current="page">{{ $breadcrumb['name'] }}</li>
            @else
                <li class="breadcrumb-item">
                    <a href="{{ $breadcrumb['url'] ?: '#' }}">{{ $breadcrumb['name'] }}</a>
                </li>
            @endif
        @endforeach
    </ol>
</nav>

<style>
.breadcrumb-nav {
    background: rgba(0,0,0,0.05);
    padding: 10px 20px;
    margin: 20px 0;
}

.breadcrumb {
    margin: 0;
    background: none;
    padding: 0;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    color: #6c757d;
}

.breadcrumb-item a {
    color: #007bff;
    text-decoration: none;
}

.breadcrumb-item a:hover {
    text-decoration: underline;
}

.breadcrumb-item.active {
    color: #6c757d;
}
</style>
@endif