<div class="container">
    {% for article in articles %}
        <div class="row">
            <div class="col-10 text-left">
                <a class="btn btn-info mt-2"
                   href="/article-{{ article['articleId'] }}-{{ article['articleRoute'] }}">{{ article['articleTitle'] }}</a>
            </div>
            <div class="col-2">
            </div>
        </div>
    {% endfor %}
</div>
<div class="container mt-5">
    <div class="row">
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            {% for page in 1..paginator['pageCount'] %}
                {% set active='btn-secondary' %}
                {% if (page-1) === paginator['page'] %}
                    {% set active='btn-primary' %}
                {% endif %}
                <a class="btn {{ active }}" href="/?offset={{ (page-1) }}">{{ page }}</a>
            {% endfor %}
        </div>
    </div>
</div>