<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>

<div class="<?php echo $pluralVar; ?> form">
<?php echo "<?php echo \$this->Form->create('{$modelClass}', array('type' => 'file', 'novalidate'=>'true')); ?>\n"; ?>
	<fieldset>
		<legend><?php printf("<?php echo __('%s %s'); ?>", Inflector::humanize(str_replace('admin', '', $action)), $singularHumanName); ?></legend>
<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				echo "\t\techo \$this->Form->input('{$field}');\n";
			}
		}
		echo "\n\t\tif (isset(\$params)) {\n\t\t\tif (array_key_exists('uploadImages', \$params)) {\n\t\t\t\techo \$this->Bambla->uploadImages(\$params);\n\t\t}\n\t}";
		
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\techo \$this->Form->input('{$assocName}');\n";
			}
		}
		echo "\t?>\n";
?>
	</fieldset>
	<div class="form-actions">
		<?php echo "<?php echo \$this->Form->button('Save', array('type' => 'submit', 'class'=>'btn btn-primary')); ?>\n"; ?>
		<?php echo "<?php echo \$this->Form->end(); ?>\n"; ?> &nbsp;
		<?php echo "<?php echo \$this->Form->postLink('Cancel', array('action' => 'index'), array('type' => 'button', 'class'=>'btn'), 'Are you sure you want to cancel changes?'); ?>\n"; ?>
	</div>
</div>