<div class="row flex-row flex-nowrap scroll">
    @foreach($categories as $category)
        <div class="col-3 m-1 p-1">
            <div class="card p-1">
                <img class="card-img-top" src="{{ $category->imageUrl }}" alt="{{ $category->name }}">
                <p class="card-text text-center">
                    <small class="text-muted">{{ $category->name }}</small>
                </p>
            </div>
        </div>
    @endforeach
</div>