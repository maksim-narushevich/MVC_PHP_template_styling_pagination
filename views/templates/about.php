{% extends "app.php" %}
{% block title %}About{% endblock %}
{% block head %}
{{ parent() }}
<style type="text/css">
    a{
        color: green;
        text-decoration: underline;
    }
</style>
{% endblock %}
{% block content %}
<div>
    <h4>About this application</h4>
    <p>1) <a href="http://altorouter.com/" target="_blank">AltoRouter</a> functionality was added for implementing REST routing. </p>
    <p>2) <a href="https://twig.symfony.com/" target="_blank">Twig</a> was used as main template engine in the view templates.</p>
    <p>3) In application also realised ability to get random images from
        <a href="https://loremflickr.com/" target="_blank">LoremFlickr</a>
        or <a href="http://lorempixel.com/" target="_blank">
            Lorempixel</a> services.</p>
    <p>
        4) Following libraries where used to customize page and improve styling:
        <ol>
        <li><a href="http://getbootstrap.com/" target="_blank">Bootstrap</a></li>
        <li><a href="https://www.w3schools.com/w3css/" target="_blank">W3 CSS</a></li>
    </ol>
    </p>
    <p>5) <b>Implemented pagination functionality with ability to show relevant pagination links.</b></p>
    <p>6) <b>Made possible to store <i>'Authors'</i> and
        <i>'Posts'</i> content in session for limiting unnecessary HTTP requests and for improving pagination functionality.</b></p>

</div>
{% endblock %}