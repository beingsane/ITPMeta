<?php
/**
 * @package      ITPMeta
 * @subpackage   Component
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2017 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      GNU General Public License version 3 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Tag controller class.
 *
 * @package        ITPMeta
 * @subpackage     Component
 * @since          1.6
 */
class ItpmetaControllerTag extends Prism\Controller\Form\Backend
{
    public function save($key = null, $urlVar = null)
    {
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        // Gets the data from the form
        $data   = $this->input->post->get('jform', array(), 'array');
        $itemId = Joomla\Utilities\ArrayHelper::getValue($data, 'id', 0, 'int');

        $redirectData = array(
            'task' => $this->getTask(),
            'id'   => $itemId
        );

        $model = $this->getModel();
        /** @var ItpmetaModelTag $model */

        // Validate the posted data.
        // Sometimes the form needs some posted data, such as for plugins and modules.
        $form = $model->getForm($data, false);
        /** @var $form JForm */

        if (!$form) {
            throw new Exception(JText::_('COM_ITPMETA_ERROR_FORM_CANNOT_BE_LOADED'));
        }

        // Test if the data is valid.
        $validData = $model->validate($form, $data);

        // Check for validation errors.
        if ($validData === false) {
            $this->displayNotice($form->getErrors(), $redirectData);
            return;
        }

        try {
            $itemId             = $model->save($validData);
            $redirectData['id'] = $itemId;
        } catch (Exception $e) {
            JLog::add($e->getMessage(), JLog::ERROR, 'com_itpmeta');
            throw new Exception(JText::_('COM_ITPMETA_ERROR_SYSTEM'));
        }

        $this->displayMessage(JText::_('COM_ITPMETA_TAG_SAVED'), $redirectData);
    }

    /**
     *
     * Prepare redirect link.
     * If has clicked apply, will be redirected to edit form and will be loaded the item data
     * If has clicked save2new, will be redirected to edit form, and you will be able to add a new record
     * If has clicked save, will be redirected to the list of items
     *
     * @param array $data
     *
     * @return string
     */
    protected function prepareRedirectLink($data)
    {
        $task = $this->getTask();
        $link = $this->defaultLink;

        $itemId = Joomla\Utilities\ArrayHelper::getValue($data, 'id');

        // Prepare redirection
        switch ($task) {
            case 'apply':
                $link .= '&view=' . $this->view_item . $this->getRedirectToItemAppend($itemId);
                break;

            case 'save2new':
                $link .= '&view=' . $this->view_item . $this->getRedirectToItemAppend();
                break;

            default:
                $urlId = JFactory::getApplication()->getUserState('url.id');
                $link .= '&view=url&layout=edit&id=' . $urlId;
                break;
        }

        return $link;
    }

    public function cancel($key = null)
    {
        $urlId = JFactory::getApplication()->getUserState('url.id');
        $this->setRedirect(JRoute::_($this->defaultLink . '&view=url&layout=edit&id=' . $urlId, false));
    }
}
