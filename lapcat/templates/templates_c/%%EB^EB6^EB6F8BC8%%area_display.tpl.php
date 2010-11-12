<?php /* Smarty version 2.6.24, created on 2010-09-14 16:04:19
         compiled from area_display.tpl */ ?>
<table cellpadding="0" cellspacing="0" width="960px" id="static" style="display:block;">
	<tr>
		<td colspan="2" style="vertical-align:top;">
			<div style="position: absolute; padding-left: 12px; top: 71px;left:10px; width: 400px;">
				<div class="font-bold font-X" style="float: left; font-size: 10px; margin-left: 4px; margin-right: 2px; text-align: center; vertical-align: top; width: auto;">Page:</div>
					<a href="/<?php echo $this->_tpl_vars['area']; ?>
?date=<?php echo $this->_tpl_vars['date']; ?>
&tag=<?php echo $this->_tpl_vars['tag']; ?>
&page=1">
						<div style="float: left; margin-right: 4px; height: 12px; text-align: center; vertical-align: top; width: 18px;" name="1" id="button-page-1" class="button-blue<?php if ($this->_tpl_vars['page'] == 1): ?>-2<?php endif; ?>">
							<span style="font-weight: bold; font-size: 10px; vertical-align: top;" class="font-G">1</span>
						</div>
					</a>
				<?php if ($this->_tpl_vars['Areapage'] != 'hours'): ?>
				<?php if ($this->_tpl_vars['page'] > 3): ?>
					<font style="float: left; font-size: 10px; margin-right: 4px; vertical-align: top; text-align: center; width: 20px;" class="font-bold font-X">...</font>
				<?php endif; ?>
				<?php $_from = $this->_tpl_vars['pageData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['pageDisplay'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['pageDisplay']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['pageDisplay']['iteration']++;
?>
					<?php if ($this->_tpl_vars['page'] != 1 && $this->_tpl_vars['page'] != 2): ?>
						<?php if ($this->_tpl_vars['value'] == $this->_tpl_vars['page'] || $this->_tpl_vars['value'] == $this->_tpl_vars['page']-1 || $this->_tpl_vars['value'] == $this->_tpl_vars['page']+1): ?>
					<a href="/<?php echo $this->_tpl_vars['area']; ?>
?date=<?php echo $this->_tpl_vars['date']; ?>
&tag=<?php echo $this->_tpl_vars['tag']; ?>
&page=<?php echo $this->_tpl_vars['value']; ?>
">
						<div style="float: left; margin-right: 4px; height: 12px; text-align: center; vertical-align: top; width: 18px;" name="<?php echo $this->_tpl_vars['value']; ?>
" id="button-page-<?php echo $this->_tpl_vars['value']; ?>
" class="button-blue<?php if ($this->_tpl_vars['value'] == $this->_tpl_vars['page']): ?>-2<?php endif; ?>">
							<span style="font-weight: bold; font-size: 10px; vertical-align: top;" class="font-G"><?php echo $this->_tpl_vars['value']; ?>
</span>
						</div>
					</a>
						<?php endif; ?>
					<?php else: ?>
						<?php if ($this->_tpl_vars['value'] == 2 || $this->_tpl_vars['value'] == 3): ?>
					<a href="/<?php echo $this->_tpl_vars['area']; ?>
?date=<?php echo $this->_tpl_vars['date']; ?>
&tag=<?php echo $this->_tpl_vars['tag']; ?>
&page=<?php echo $this->_tpl_vars['value']; ?>
">
						<div style="float: left; margin-right: 4px; height: 12px; text-align: center; vertical-align: top; width: 18px;" name="<?php echo $this->_tpl_vars['value']; ?>
" id="button-page-<?php echo $this->_tpl_vars['value']; ?>
" class="button-blue<?php if ($this->_tpl_vars['value'] == $this->_tpl_vars['page']): ?>-2<?php endif; ?>">
							<span style="font-weight: bold; font-size: 10px; vertical-align: top;" class="font-G"><?php echo $this->_tpl_vars['value']; ?>
</span>
						</div>
					</a>
						<?php endif; ?>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<?php if ($this->_foreach['pageDisplay']['total'] != $this->_tpl_vars['page'] && $this->_foreach['pageDisplay']['total'] > 3): ?>
					<font style="float: left; font-size: 10px; margin-right: 4px; vertical-align: top; text-align: center; width: 20px;" class="font-bold font-X">...</font>
				<?php endif; ?>
				<?php endif; ?>
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="vertical-align:top;">
			<div id="news-header" style="display:block;">
				<div class="color-X-4 corners-bottom-2 corners-top-2 shadow-or-light-X-down" style="background-position:0px 2px; width:100%;">
					<div class="corners-bottom-2 corners-top-2 shadow-or-light-Y-up" style="background-position:0px -2px; width:100%;">
						<div class="corners-bottom-2 corners-top-2 shadow-or-light-Y-up" style="margin-left:2px; margin-right:2px; width:auto;">
							<div class="corners-bottom-2 corners-top-2 shadow-or-light-Y-down" style="margin-left:2px; margin-right:2px; width:auto;">
								<table cellpadding="0" cellspacing="0" style="height:18px; width:100%;">
								    <tr>
										<td style="height:18px; width:auto; overflow:hidden;">
											<div style="height:18px; max-height:18px; overflow:hidden; width:100%;"><font class="font-bold font-X" id="header" style="font-size:14px;"><?php echo $this->_tpl_vars['area']; ?>
</font></div>
										</td>
								    	<td id="icons" style="height:18px; width:120px;">
											<div class="corners-top-2 shadow-up" style="float:right; height:16px; max-height:16px; margin-top:1px; width:auto;">
												<img class="fake-link float-right magnifier-click" id="zoom-in" src="http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_in.png" style="height:16px; width:16px;" title="Click to expand this display."/>
												<img class="fake-link float-right magnifier-click" id="zoom-out" src="http://cdn1.lapcat.org/famfamfam/silk/magnifier_zoom_out.png" style="display:block; height:16px; width:16px;" title="Click to shrink this display."/>
												<span class="float-right border-right-C-1" style="height:16px; margin-right:2px; width:2px;"></span>
												<img class="fake-link float-right view-click" id="list-view" src="http://cdn1.lapcat.org/famfamfam/silk/application_view_list.png" style="height:16px; width:16px;" title="Click to show this information in a list."/>
												<img class="fake-link float-right view-click" id="featured-view" src="http://cdn1.lapcat.org/famfamfam/silk/layout_content.png" style="display:block; height:16px; width:16px;" title="Click to show the featured article."/>
												<span class="float-right border-right-C-1" style="height:16px; margin-right:2px; width:2px;"></span>
												<?php if ($this->_tpl_vars['user'] != ""): ?>
												<a href="">
													<img class="fake-link float-right remove-search-click" id="search-on-search" src="http://cdn1.lapcat.org/famfamfam/silk/user_delete.png" style="display:block; height:16px; margin-right:2px; width:16px;" title="Click to remove the username from this search." />
												</a>
												<?php endif; ?>
												<?php if ($this->_tpl_vars['date'] != ""): ?>
												<a href="/<?php echo $this->_tpl_vars['area']; ?>
?date=&user=<?php echo $this->_tpl_vars['user']; ?>
&tag=<?php echo $this->_tpl_vars['tag']; ?>
&page=<?php echo $this->_tpl_vars['value']; ?>
">
													<img class="fake-link float-right remove-search-click" id="search-on-date" src="http://cdn1.lapcat.org/famfamfam/silk/date_delete.png" style="display:block; height:16px; margin-right:2px; width:16px;" title="Click to remove the date from this search." />
												</a>
												<?php endif; ?>
											</div>
										</td>
							        </tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</td>
	</tr>
	<tr>
		<td style="vertical-align:top;height: 526px; width: 384px;">
			<?php $_from = $this->_tpl_vars['V_displayData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['listLoop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listLoop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
        $this->_foreach['listLoop']['iteration']++;
?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "side_list.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endforeach; endif; unset($_from); ?>
		</td>
		<td width="584px" style="vertical-align:top;">
			<?php if ($this->_tpl_vars['Areapage'] != 'hours'): ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main_display.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php else: ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "hours_display.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endif; ?>
		</td>
	</tr>
</table>