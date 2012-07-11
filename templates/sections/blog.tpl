<div class="blogBox roundAll3">
  <div class="blogTitle roundAll3 titleElement color3">
    <a href="http://laportelibrary.blogspot.com/">Latest From Blog</a>
  </div>
  <div id="blogContainerBox" class="insideBoxShadow roundAll3 containerBox" >
    {foreach from=$blog item=b}
    <article class="blogItem">
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
        <div id="socialMediaContainer" style="width:25%;">
          <div style="display:table-cell">
            <div data-href="{$b.link}" data-size="small" class="g-plusone"></div>  
          </div>
          <div style="display:table-cell">
            <div class="fb-like" data-href="{$b.link}?spref=fb" data-send="false" data-layout="button_count" data-width="200" data-show-faces="false" data-font="arial"></div>
          </div>
          
        </div>
      </div>
    </article>
    {/foreach}
  </div>
</div>