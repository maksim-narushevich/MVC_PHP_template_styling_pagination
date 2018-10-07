{% extends "app.php" %}
{% block title %}Index{% endblock %}
{% block head %}
{{ parent() }}
<style type="text/css">
    #links a { margin-bottom: 15px;
    display: inline-block;}
    #links i{
        color: darkgreen;
        font-size: 30px;
        margin-right: 20px;
    }
    #links i:hover{
        color: lightgreen;
    }

</style>
{% endblock %}
{% block content %}
<div class="col-sm-12 col-xs-12">
    <div class="col-sm-10  col-xs-12" id="links">
        <a href="{{strSubfolderRoute}}/template/1" ><i class="fab fa-typo3"></i>MAQE Homework Challenge - Template and Styling</a><br>

        <a href="{{strSubfolderRoute}}/about" ><i class="fas fa-info-circle"></i> About</a><br>
    </div>
    </div>
{% endblock %}