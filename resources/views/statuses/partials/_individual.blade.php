<article class="paper">
    <div class="row">
        <div class="col-xs-12">


            <h2>{{ $status->title }}</h2>

            @include('statuses.partials._status')

            <p>Published {{ $status->published_at->diffForHumans() }} by {{ $status->author->name }}</p>


        </div>
    </div>
</article>