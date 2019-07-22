<div class="container">
    <div class="row">
        <div class="col-2 text-left">
            <a class="btn btn-info" href="/">Back to list</a>
        </div>
        <div class="col-10">
            <div class="article text-left">
                <h1>{{ article['articleTitle'] }}</h1>
                <h4>{{ article['articleCreatedDate'] }}</h4>
            </div>
            <div class="mt-1 text-left">
                {{ article['articleDescription'] }}
            </div>
        </div>
    </div>
</div>
