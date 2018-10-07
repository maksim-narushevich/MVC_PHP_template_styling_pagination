{% extends "app.php" %}
{% block title %}MAQE Templating{% endblock %}
{% block head %}
{{ parent() }}

{% endblock %}
{% block content %}
<div>
    <h2 class="w3-xlarge">Subtitle</h2>
    <h5>Posts</h5>
    {% for key,post in arrData['arrPosts'] %}
    <div class="row item w3-margin-bottom {{key%2?'':'background'}}">
        <div class="col-sm-9 col-xs-12 post_item">
            <div class="row">
                <div class="col-sm-3">
                    {% if arrConfig['useAnotherImageRandomGenerator'] %}
                    <img src="https://loremflickr.com/320/240/city?random={{key}}" data-toggle="modal"
                         data-target="#imageModal_{{ post.id }}" alt="">
                    {% else %}
                    <img src="{{ post.image_url }}" data-toggle="modal" data-target="#imageModal_{{ post.id }}" alt="">
                    {% endif %}
                </div>
                <div class="col-sm-9">
                    <p class="post_title">{{ post.title }}</p>
                    <p class="post_body w3-tiny">{{ post.body }}</p>
                    <p class="post_time smaller"><i class="far fa-clock"></i>
                        <i>{{getHumanDiffDate(post.created_at)}}</i></p>
                </div>
            </div>
        </div>
        <div class="col-sm-1 col-xs-12 divider"></div>
        <div class="col-sm-2 col-xs-12 author_item w3-center">
            <p><img src="{{arrData['arrAuthors'][post.author_id].avatar_url}}" alt=""></p>
            <p class="w3-text-red">{{arrData['arrAuthors'][post.author_id].name}}</p>
            <p>{{arrData['arrAuthors'][post.author_id].role}}</p>
            <p><i class="fas fa-map-marker-alt smaller"></i> {{arrData['arrAuthors'][post.author_id].place}}</p>
        </div>
    </div>

    <div id="imageModal_{{ post.id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="https://loremflickr.com/320/240/city?random={{key}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {% endfor %}

    <div class="w3-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                {% if currentPage!=1  %}
                <li class="page-item"><a class="page-link" href="{{strSubfolderRoute}}/template/{{currentPage-1}}">Previous</a></li>
                {% endif %}
                {% for page in range(1,(ceil(countArray(arrAllPosts)/8))) %}
                <li class="page-item"><a class="page-link {{page==currentPage?'w3-red':''}}" href="{{strSubfolderRoute}}/template/{{page}}">{{page}}</a></li>
                {% endfor %}
                {% if currentPage!=ceil(countArray(arrAllPosts)/8)  %}
                <li class="page-item"><a class="page-link" href="{{strSubfolderRoute}}/template/{{currentPage+1}}">Next</a></li>
                {% endif %}
            </ul>
        </nav>
    </div>
</div>
{% endblock %}