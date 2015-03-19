{config_load file="test.conf" section="setup"}
{include file="base.tpl" title=foo}

{include file="header.tpl"}
{include file="left.tpl"}
{include file="right.tpl"}

<div id="indexcontent">
{include file="carousel.tpl"}

{include file="indexshow.tpl"}

</div>


<script src="js/foucs.js"></script>

{include file="footer.tpl"}
