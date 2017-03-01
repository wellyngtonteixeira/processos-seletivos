
<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  COM_PROCSEL
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<form action="index.php?option=com_procsel&view=procsel" method="post" id="adminForm" name="adminForm">
	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th width="1%"><?php echo JText::_('COM_PROCSEL_NUM'); ?></th>
			<th width="2%">
				<?php echo JHtml::_('grid.checkall'); ?>
			</th>
			<th width="90%">
				<?php echo JText::_('COM_PROCSEL_PROCSEL_NOME_CURSO') ;?>
			</th>
			<th width="7%">
				<?php echo JText::_('COM_PROCSEL_COD_CURSO'); ?>
			</th>
		</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="5">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) : ?>
 
					<tr>
						<td>
							<?php echo $this->pagination->getRowOffset($i); ?>
						</td>
						<td>
							<?php echo JHtml::_('grid.id', $i, $row->cod_curso); ?>
						</td>
						<td>
							<?php echo $row->nome_curso; ?>
						</td>
						<td align="center">
							<?php echo $row->cod_curso; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
</form>