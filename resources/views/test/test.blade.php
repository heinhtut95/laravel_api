<h1>Title</h1>
<ul id="title">

</ul>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript">
    $(function(){
        $.getJSON('/api/lesson',function(data){
            var html="";
            $(data.data).each(function(){
                html += '<li><a href="/api/test/'+this.id+'">'+this.title+'-------'+this.is_free+'</a></li>';
            })
            $("#title").append(html);
        });
    })
</script>