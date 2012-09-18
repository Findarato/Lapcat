<div class="blogBox roundAll3">
  <div class="blogTitle roundAll3 titleElement color3 icon-vkontakte-rect font1">
    <a href="http://laportelibrary.blogspot.com/">Latest From Blog</a>
  </div>
  <div id="blogContainerBox" class="insideBoxShadow roundAll3 containerBox" >
    {foreach from=$blog item=b}
    <div style="display:table">
      <article class="blogItem" style="display:table-cell">
        <div>
          <div class="blogEntryTitle">
            <a href="{$b.link}" target="_blank">{$b.title}</a>
          </div>
          <div class="blogEntryAuthor">
            <span>By <a href="http://www.blogger.com/profile/02518150572940741810">{$b.author.name}</a> on {$b.date}</span>
          </div>
          <div class="blogEntryDescription">
            {$b.contents}
          </div>
        </div>
      </article>
      <div id="socialMediaContainer" style="width:50px;right:5px;top:5px;display:table-cell">
        <div >
          <div data-href="{$b.link}" data-size="tall" class="g-plusone"></div>
        </div>
        <div>
          {*<div class="fb-like" data-href="{$b.link}?spref=fb" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false" data-font="arial"></div>*}
          <div class="fb-like" data-href="{$b.link}?spref=fb" data-send="false" data-layout="box_count" data-width="50" data-show-faces="false"></div>
        </div>
      </div>
    </div>
    {/foreach}
  </div>
</div>