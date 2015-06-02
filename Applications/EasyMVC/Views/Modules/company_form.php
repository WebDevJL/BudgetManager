<?php if (!defined('__EXECUTION_ACCESS_RESTRICTION__')) exit('No direct script access allowed'); ?>

<fieldset class="company_form">
  <legend><?php echo $resx["company_legend"]; ?></legend>
  <ol class="add-new-item">
    <li>
      <label><?php echo $resx["company_name"]; ?></label>
      <input name="company_name" type="text" />
    </li>
    <li>
      <label><?php echo $resx["company_contact_name"]; ?></label>
      <input name="company_contact_name" type="text" />
    </li>
    <li>
      <label><?php echo $resx["company_contact_phone"]; ?></label>
      <input name="company_contact_phone" type="text" />
    </li>
    <li>
      <label><?php echo $resx["company_contact_email"]; ?></label>
      <input name="company_contact_email" type="text" />
    </li>
    <li>
      <label><?php echo $resx["company_id_number"]; ?></label>
      <input name="company_id_number" type="text" />
    </li>
  </ol>
</fieldset>
