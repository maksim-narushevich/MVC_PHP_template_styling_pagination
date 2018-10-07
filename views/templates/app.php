<!DOCTYPE html>
<html>
<head>
    {% block head %}

    <title>{% block title %}{% endblock %}</title>
    <link rel="stylesheet" href="{{strSubfolderRoute}}/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{strSubfolderRoute}}/public/css/w3.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css"
          integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <script src="{{strSubfolderRoute}}/public/js/jquery.min.js"></script>
    <script src="{{strSubfolderRoute}}/public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{strSubfolderRoute}}/public/css/style.css"/>
    <style>
        .inline {
            display: inline;
        }
    </style>
    {% endblock %}
</head>
<body>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2 col-xs-12">
        <div class="col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
            {% if home is not defined %}
            <h1 class="inline"><a class="btn btn-warning" href="{{strSubfolderRoute}}/">Home page</a></h1>
            {% endif %}
        </div>
        <div class="col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 forum">
            <h1>MAQE Forums</h1>
            <div id="content">{% block content %}{% endblock %}</div>
        </div>
        <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
            <div id="footer">
                {% block footer %}
                2018  Developed by <a href="https://www.linkedin.com/in/maksim-narushevich-b99783106/"
                                        target="_blank">Maksim Narushevich</a>.
                {% endblock %}
            </div>
        </div>
    </div>
</div>

<script src="{{strSubfolderRoute}}/public/js/script.js"></script>
</body>
</html>