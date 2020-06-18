<nav id="breadcrumb">
    <p>YOU ARE HERE</p>

    <?php
    $this->Breadcrumbs->add(__('LISTS'), ['controller' => 'releases', 'action' => 'index']);
    $this->Breadcrumbs->add(__('CUSTOM LIST'), ['controller' => 'releases', 'action' => 'customize']);

    echo $this->Breadcrumbs->render([], ['separator' => ' / ']);
    ?>
</nav>

<div class="releases index content">
    <h2>Your Customized List</h2>

    <div class="both"></div>

    <p>
        You can build your customized list by selecting any of the available fields.<br/>
        Once you satisfied with your list, scroll down to save it and share with the community. Explore!
    </p>

    <div class="customize">
        <?php
        echo $this->Form->create();
        echo $this->Form->select(
            'custom-fields',
            $options,
            [
                'multiple' => true,
                'id' => 'custom-fields',
                'val' => $display['custom-fields']
            ]
        );
        echo $this->Form->submit(__('Create'));
        echo $this->Form->end();
        ?>
    </div>

    <div class="table-responsive custom-table">
        <table class="tb">
            <thead>
                <tr>
                    <th rowspan="2" class="tb-id"><?php echo $this->Paginator->sort('rank', '#') ?></th>

                    <?php
                    $total_information = 0;
                    $total_io500 = 0;
                    $total_mdtest = 0;
                    $total_ior = 0;
                    $total_find = 0;

                    foreach ($display['custom-fields'] as $field) {
                        if (strpos($field, 'information_') === 0) {
                            $total_information += 1;
                        }
                    }

                    foreach ($display['custom-fields'] as $field) {
                        if (strpos($field, 'io500_') === 0) {
                            $total_io500 += 1;
                        }
                    }

                    foreach ($display['custom-fields'] as $field) {
                        if (strpos($field, 'mdtest_') === 0) {
                            $total_mdtest += 1;
                        }
                    }

                    foreach ($display['custom-fields'] as $field) {
                        if (strpos($field, 'ior_') === 0) {
                            $total_ior += 1;
                        }
                    }

                    foreach ($display['custom-fields'] as $field) {
                        if (strpos($field, 'find_') === 0) {
                            $total_find += 1;
                        }
                    }
                    ?>

                    <?php if ($total_information) { ?>
                    <th colspan="<?php echo $total_information; ?>" class="tb-center">Information</th>
                    <?php } ?>

                    <?php if ($total_io500) { ?>
                    <th colspan="<?php echo $total_io500; ?>" class="tb-center">IO500</th>
                    <?php } ?>

                    <?php if ($total_mdtest) { ?>
                    <th colspan="<?php echo $total_mdtest; ?>" class="tb-center">MDTEST</th>
                    <?php } ?>

                    <?php if ($total_ior) { ?>
                    <th colspan="<?php echo $total_ior; ?>" class="tb-center">IOR</th>
                    <?php } ?>

                    <?php if ($total_find) { ?>
                    <th colspan="<?php echo $total_find; ?>" class="tb-center">FIND</th>
                    <?php } ?>
                </tr>
                <tr>
                    <?php
                    if ($total_information) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'information_') === 0) {
                    ?>

                    <th rowspan="2"><?php echo $this->Paginator->sort($field, str_replace('_', ' ', str_replace('information_', '', $field))); ?></th>

                    <?php
                            }
                        }
                    }
                    
                    if ($total_io500) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'io500_') === 0) {
                    ?>

                    <th rowspan="2" class="tb-number"><?php echo $this->Paginator->sort($field, str_replace('_', ' ', str_replace('io500_', '', $field))); ?></th>

                    <?php
                            }
                        }
                    }
                    
                    if ($total_mdtest) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'mdtest_') === 0) {
                    ?>

                    <th rowspan="2" class="tb-number"><?php echo $this->Paginator->sort($field, str_replace('_', ' ', str_replace('mdtest_', '', $field))); ?></th>

                    <?php
                            }
                        }
                    }
                    
                    if ($total_ior) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'ior_') === 0) {
                    ?>

                    <th rowspan="2" class="tb-number"><?php echo $this->Paginator->sort($field, str_replace('_', ' ', str_replace('ior_', '', $field))); ?></th>

                    <?php
                            }
                        }
                    }
                    
                    if ($total_find) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'find_') === 0) {
                    ?>

                    <th rowspan="2" class="tb-number"><?php echo $this->Paginator->sort($field, str_replace('_', ' ', str_replace('find_', '', $field))); ?></th>

                    <?php
                            }
                        }
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($releases as $i => $release) { ?>
                <tr>
                    <td class="tb-id">
                        <b class="rank"><?php echo (($this->Paginator->current('Releases') - 1) * $limit) + ($i + 1) ?></b>
                    </td>

                    <?php
                    if ($total_information) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'information_') === 0) {
                    ?>
                    <td><?php echo h($release->{$field}) ?></td>
                    <?php
                            }
                        }
                    }
                    
                    if ($total_io500) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'io500_') === 0) {
                    ?>
                    <td class="tb-number"><?php echo $this->Number->format($release->{$field}, ['places' => 2, 'precision' => 2]) ?></td>
                    <?php
                            }
                        }
                    }
                    
                    if ($total_mdtest) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'mdtest_') === 0) {
                    ?>
                    <td class="tb-number"><?php echo $this->Number->format($release->{$field}, ['places' => 2, 'precision' => 2]) ?></td>
                    <?php
                            }
                        }
                    }
                    
                    if ($total_ior) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'ior_') === 0) {
                    ?>
                    <td class="tb-number"><?php echo $this->Number->format($release->{$field}, ['places' => 2, 'precision' => 2]) ?></td>
                    <?php
                            }
                        }
                    }
                    
                    if ($total_find) {
                        foreach ($display['custom-fields'] as $field) {
                            if (strpos($field, 'find_') === 0) {
                    ?>
                    <td class="tb-number"><?php echo $this->Number->format($release->{$field}, ['places' => 2, 'precision' => 2]) ?></td>
                    <?php
                            }
                        }
                    }
                    ?>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="paginator">
        <ul class="pagination">
            <?php echo $this->Paginator->first('<< ' . __('first')) ?>
            <?php echo $this->Paginator->prev('< ' . __('previous')) ?>
            <?php echo $this->Paginator->numbers() ?>
            <?php echo $this->Paginator->next(__('next') . ' >') ?>
            <?php echo $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
    </div>

    <?php if ($selected_fields) {?>

    <p>
        You can save this list and share it with your collegues!
    </p>

    <div class="customize">
        <?php
        echo $this->Form->create(null, [
            'url' => [
                'controller' => 'records',
                'action' => 'save'
            ]
        ]);
        echo $this->Form->control('name');
        echo $this->Form->control('author');
        echo $this->Form->control('fields', [
            'value' => $selected_fields
        ]);

        echo $this->Form->submit(__('Save'));
        echo $this->Form->end();
        ?>
    </div>

    <?php } ?>

    <div id="disqus_thread"></div>
</div>

<script>
var disqus_config = function () {
    this.page.url = "<?php echo $this->Url->build($this->request->getRequestTarget(), ['fullBase' => true]); ?>";
    this.page.identifier = "<?php echo $this->Url->build($this->request->getRequestTarget()); ?>";
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://io500.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>