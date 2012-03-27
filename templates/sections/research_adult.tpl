<div class="blogBox roundAll3">
	<div class="roundAll3 titleElement color3"><a href="/research.php" style="height:100%;width:100%">Adult Research Links</a></div>
	<div id="researchAdultContainerBox" class="insideBoxShadow roundAll3 containerBox" >
		<div>
			<ul style="font-size:1.2em">
			{foreach $dbObjects as $item}
				<li class="researchList {$item.category}">
					{*<span>{$item.title}</span>*}
					{if $inside eq true}
						{if $item.libraryOnly eq true}
							<span class="iconic lock_fill" style="margin-right:3px;cursor:help"  title="Available at the library only"></span>
							<a href="{$item.link_in}" >{$item.title}</a>
						{else}
							<a class="" href="{$item.link_in}">{$item.title}</a>
						{/if}
					{else} 
						{if $item.libraryOnly eq true}
							<span class="iconic lock_fill" style="color:red;margin-right:3px;cursor:help"  title="Available at the library only"></span>
							<span>{$item.title}</span>
						{else}
							<a href="{$item.link_out}">{$item.title}</a>
						{/if}
					{/if}
					
					<label data-link="{if $inside eq true}{$item.link_in}{else}{$item.link_out}{/if}" class="hoverCard color3Circle" style="display:none;margin-left:3px,font-size:1em,color:rgba(85, 102, 68,.6)">?</label>
					<img class="researchInfoBasic" src="{$item.image}" style="align:left;height:100px;width:100px;">
					<div class="researchInfoBasic">{$item.about}</div>
				</li>
			{/foreach}
			</ul>
		</div>
	</div>
</div>