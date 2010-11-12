<?php /* Smarty version 2.6.24, created on 2010-09-14 16:04:19
         compiled from side_list.tpl */ ?>
			<div id="static-HTML-300-<?php echo $this->_tpl_vars['key']; ?>
" style="vertical-align:top;display:block;">
				<div style="float:left; height:40px; margin-bottom:3px;max-height:40px; text-align:center; width:100%;">
					<a href="/<?php echo $this->_tpl_vars['area']; ?>
?item=<?php echo $this->_tpl_vars['value']['ID']; ?>
&date=<?php echo $this->_tpl_vars['date']; ?>
&tag=<?php echo $this->_tpl_vars['tag']; ?>
&page=<?php echo $this->_tpl_vars['pageNum']; ?>
&user=<?php echo $this->_tpl_vars['user']; ?>
">
						<div class="<?php if ($this->_tpl_vars['item'] == $this->_tpl_vars['value']['ID']): ?>open-line<?php else: ?><?php if (! isset ( $this->_tpl_vars['item'] ) && ($this->_foreach['listLoop']['iteration'] <= 1)): ?>open-line<?php else: ?>button-Y-35 line-click<?php endif; ?><?php endif; ?>" id="<?php echo $this->_tpl_vars['value']['ID']; ?>
" style="height:40px; width:auto;" title="Click to expand this display.">
							<div style="background-position:0px 1px; height:19px; overflow:hidden; text-align:left; width:100%;">
								<div style="display:table; height:18px; width:100%;">
									<div style="display:table-cell; height:18px; overflow:hidden; vertical-align:top; max-width:100%; width:auto;">
										<div style="width:100%;">
											<font class="font-X" style="float:left; font-size:17px; margin-left:6px; vertical-align:top;"><?php echo $this->_tpl_vars['value']['name']; ?>
</font>
										</div>
									</div>
									<div style="display:table-cell; float:right; height:19px; overflow:hidden; text-align:left; max-width:90px; width:auto;">
										<div id="icons-replace-counter" style="width:100%;">
											<img src="/lapcat/images/31-31-0.png" id="area-condition-eye" style="display:none; height:16px; width:16px;" />
											<img src="/lapcat/images/31-31-91.png" id="area-condition-new" style="display:none; height:16px; width:16px;" />
											<img src="/lapcat/images/31-31-92.png" id="area-condition-heart" style="display:none; height:12px; margin-bottom:2px; width:12px;" />
										</div>
									</div>
								</div>
							</div>
							<div style="height:21px; overflow:hidden; width:auto;">
								<div style="width:100%;">
									<div style="float:left; margin-left:1px; vertical-align:top; width:210px;">
										<div style="margin:1px; text-align:left; width:auto;">
										<?php if ($this->_tpl_vars['Areapage'] == 'news'): ?>
											<font class="font-X" style="font-size:10px; margin-left:12px;">by</font>
											<a class="add-to-search user-link-1 font-X" href="/<?php echo $this->_tpl_vars['area']; ?>
?item=<?php echo $this->_tpl_vars['item']; ?>
&date=<?php echo $this->_tpl_vars['date']; ?>
&tag=<?php echo $this->_tpl_vars['tag']; ?>
&user=<?php echo $this->_tpl_vars['value']['entered_by_id']; ?>
" style="font-size:12px; margin-right:3px;"><?php echo $this->_tpl_vars['value']['username']; ?>
</a>
										<?php endif; ?>
										<?php if ($this->_tpl_vars['Areapage'] == 'events'): ?>
											<font class="font-X" style="font-size:10px; margin-left:12px;">at</font>
											<a class="add-to-search user-link-1 font-X" href="/<?php echo $this->_tpl_vars['area']; ?>
?item=<?php echo $this->_tpl_vars['item']; ?>
&date=<?php echo $this->_tpl_vars['date']; ?>
&tag=<?php echo $this->_tpl_vars['tag']; ?>
&user=<?php echo $this->_tpl_vars['value']['library_ID']; ?>
" style="font-size:12px; margin-right:3px;"><?php echo $this->_tpl_vars['value']['library']; ?>
</a>
										<?php endif; ?>
										</div>
									</div>
									<div style="float:right; vertical-align:top; padding-right:6px; width:auto;">
										<a class="add-to-search font-X" href="/<?php echo $this->_tpl_vars['area']; ?>
?item=<?php echo $this->_tpl_vars['item']; ?>
&date=<?php echo $this->_tpl_vars['value']['o_date']; ?>
&tag=<?php echo $this->_tpl_vars['tag']; ?>
" style="font-size:12px; margin-right:3px;"><?php echo $this->_tpl_vars['value']['date_words']; ?>
</a>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>