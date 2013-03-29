<?php
/**
 * @package      ITPrism Components
 * @subpackage   ITPMeta
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2010 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * ITPMeta is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

// No direct access
defined('_JEXEC') or die;
?>
<div class="clr"></div>
<?php echo $this->form->getLabel('after_body_tag'); ?>
<div class="clr"></div>
<?php echo $this->form->getInput('after_body_tag'); ?>

<div class="clr"></div>
<?php echo $this->form->getLabel('before_body_tag'); ?>
<div class="clr"></div>
<?php echo $this->form->getInput('before_body_tag'); ?>

<?php echo $this->form->getInput('url_id'); ?>