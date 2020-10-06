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
<div class="<?php echo $pluralVar; ?> view">
<h2><?php echo "<?php echo __('{$singularHumanName}'); ?>"; ?></h2>
	<dl>
<?php
foreach ($fields as $field) {
	$isKey = false;
	if (!empty($associations['belongsTo'])) {
		foreach ($associations['belongsTo'] as $alias => $details) {
			if ($field === $details['foreignKey']) {
				$isKey = true;
				echo "\t\t<dt><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></dt>\n";
				echo "\t\t<dd>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t&nbsp;\n\t\t</dd>\n";
				break;
			}
		}
	}
	if ($isKey !== true) {
		echo "\t\t<dt><?php echo __('" . Inflector::humanize($field) . "'); ?></dt>\n";
		if (preg_match('/image/',$field)) {
			echo "\t\t<dd>\n\t\t\t<?php echo \$this->Html->image('uploads/'.\${$singularVar}['{$modelClass}']['{$field}'], array('width' => 120)); ?>\n\t\t\t&nbsp;\n\t\t</dd>\n";
		} else {
			echo "\t\t<dd>\n\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t\t&nbsp;\n\t\t</dd>\n";
		}
	}
}
?>
	</dl>
	<br>
	<?php echo "<?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['id']), array('class'=>'btn btn-info')); ?>\n"; ?>
		&nbsp;
	<?php echo "<?php echo \$this->Html->link(__('List All'), array('action' => 'index'), array('class'=>'btn')); ?>\n"; ?>
</div>

<?php
if (!empty($associations['hasOne'])) :
	foreach ($associations['hasOne'] as $alias => $details): ?>
	<div class="related">
		<h3><?php echo "<?php echo __('Related " . Inflector::humanize($details['controller']) . "'); ?>"; ?></h3>
	<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
		<dl>
	<?php
			foreach ($details['fields'] as $field) {
				echo "\t\t<dt><?php echo __('" . Inflector::humanize($field) . "'); ?></dt>\n";
				echo "\t\t<dd>\n\t<?php echo \${$singularVar}['{$alias}']['{$field}']; ?>\n&nbsp;</dd>\n";
			}
	?>
		</dl>
	<?php echo "<?php endif; ?>\n"; ?>
		<div class="actions">
			<ul>
				<li><?php echo "<?php echo \$this->Html->link(__('Edit " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'edit', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></li>\n"; ?>
			</ul>
		</div>
	</div>
	<?php
	endforeach;
endif;
if (empty($associations['hasMany'])) {
	$associations['hasMany'] = array();
}
if (empty($associations['hasAndBelongsToMany'])) {
	$associations['hasAndBelongsToMany'] = array();
}
$relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);
foreach ($relations as $alias => $details):
	$otherSingularVar = Inflector::variable($alias);
	$otherPluralHumanName = Inflector::humanize($details['controller']);
	?>
<div class="related">
	<h3><?php echo "<?php echo __('Related " . $otherPluralHumanName . "'); ?>"; ?></h3>
	<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])): ?>\n"; ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
<?php
			foreach ($details['fields'] as $field) {
				echo "\t\t<th><?php echo __('" . Inflector::humanize($field) . "'); ?></th>\n";
			}
?>
		<th class="actions"><?php echo "<?php echo __('Actions'); ?>"; ?></th>
	</tr>
<?php
echo "\t<?php foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}): ?>\n";
		echo "\t\t<tr>\n";
			foreach ($details['fields'] as $field) {
				echo "\t\t\t<td><?php echo \${$otherSingularVar}['{$field}']; ?></td>\n";
			}

			echo "\t\t<td nowrap class=\"actions\">\n";
		echo "\t\t\t<?php echo \$this->Html->link('<i class=\"icon-info-sign\"></i>', array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=>'btn btn-info','escape' => false,'alt'=>'View','title'=>'View')); ?>\n";
		echo "\t\t\t<?php echo \$this->Html->link('<i class=\"icon-edit\"></i>', array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=>'btn btn-warning','escape' => false,'alt'=>'Edit','title'=>'Edit')); ?>\n";
		echo "\t\t\t<?php echo \$this->Form->postLink('<i class=\"icon-remove\"></i>', array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=>'btn btn-danger','escape' => false,'alt'=>'Delete','title'=>'Delete'), __('Are you sure you want to delete # %s?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
		echo "\t\t</td>\n";
	echo "\t</tr>\n";

echo "\t<?php endforeach; ?>\n";
?>
	</table>
<?php echo "<?php endif; ?>\n\n"; ?>
	<?php echo "<?php echo \$this->Html->link('<i class=\"icon-plus-sign\"></i> New " . Inflector::humanize(Inflector::underscore($alias)) . "', array('controller' => '{$details['controller']}', 'action' => 'add'), array('class'=>'btn btn-info','escape' => false,'alt'=>'New " . Inflector::humanize(Inflector::underscore($alias)) . "','title'=>'New " . Inflector::humanize(Inflector::underscore($alias)) . "')); ?>"; ?>
	
</div>
<?php endforeach; ?>
