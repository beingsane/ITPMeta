<?php
/**
 * @package      ITPrism Components
 * @subpackage   VipQuotes
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2010 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * VipQuotes is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

// no direct access
defined('_JEXEC') or die;
?>
<tr>
    <th width="3%">
        <input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
    </th>
    <th class="title">
        <?php echo JHtml::_('grid.sort',  'COM_ITPMETA_URI_STRING', 'a.uri', $this->listDirn, $this->listOrder); ?>
    </th>
    <th width="5%">&nbsp;</th>
    <th width="10%"><?php echo JHtml::_('grid.sort',  'JSTATUS', 'a.published', $this->listDirn, $this->listOrder); ?></th>
    <th width="3%"><?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ID', 'a.id', $this->listDirn, $this->listOrder); ?></th>
</tr>