<script type="text/javascript">

instaGallery = {};

instaGallery.InstaGallery = function(el)
{
  this.el = el;
  this.firstLoad = true;
  this.onFirstLoad = null;

  var that = this;
  var xhr = $.getJSON("http://www.northseajazzclub.com/wp-content/themes/nsjc/inc/instagram-model.php",
            function(json) { that.loadFromJSON(json); }
             );

  $(window).resize(function()
  {
    that.update();
  });
}

instaGallery.InstaGallery.IMAGE_SIZE = 251;

instaGallery.InstaGallery.prototype.loadFromJSON = function(json)
{
  this.items = json["data"];
  this.update();
}

instaGallery.InstaGallery.prototype.setOnFirstLoad = function(onFirstLoad)
{
  this.onFirstLoad = onFirstLoad;
}

instaGallery.InstaGallery.prototype.update = function(json)
{
  if (this.items)
  {
    var totalWidth = this.el.width();
    var totalHeight = this.el.height();

    var nColumns = Math.ceil(totalWidth / instaGallery.InstaGallery.IMAGE_SIZE);
    var nRows = Math.ceil(totalHeight / instaGallery.InstaGallery.IMAGE_SIZE);

    var html = "";
    var i = 0;

    for (var y = 0; y < nRows && i < this.items.length; y++)
    {
      for (var x = 0; x < nColumns && i < this.items.length; x++)
      {
        var item = this.items[i];

        html += "<a href=\"" + item["link"] + "\"><img src=\"" + item["images"]["low_resolution"]["url"] + "\"/></a>";

        i++;
      }

    }

    this.el.html(html);

    var that = this;
    $("img", this.el).load(function()
    {
      i--;
      if (i == 0)
      {
        if (that.firstLoad)
        {
          that.firstLoad = false;

          if (that.onFirstLoad)
          {
            that.onFirstLoad();
          }
        }
      }
    });
  }
}

window.onload = function()
{
  var gallery = new instaGallery.InstaGallery($(".photo-wrapper"));
  gallery.setOnFirstLoad(function()
  {
  });

}

</script>

<div id="instaGallery"></div>

<div id="instagram-finds">

  <h2>Instagram finds</h2>

  <div class="photo-wrapper">

  </div>

</div>