<div class="row clearfix">
    <img style="float: left; height: 100px;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/kpk-logo.jpg"/>

    <div class="text-center pull-right" style="width: 350px;">
        <address>
            <strong><span style="font-size: 12pt; font-family: 'Bookman Old Style'">
                    OFFICE OF THE DIRECTOR GENERAL<br />
                    PROVINCIAL HOUSING AUTHORITY</span></strong><br />
            (ATI Campus) Jamrud Road, Peshawar<br />
            <small>Phone: +92 91 9218265, 9218445  Fax: +92 91 9218420</small><br />
            <small>Website: www.housingkp.gov.pk  Email: dg.pha@hotmail.com</small>
        </address>
    </div>
</div>
<div class="text-right" id="ref">
    No. <?php echo $model->allotment->order_no; ?> <br />
    Dated: <?php echo $model->allotment->date; ?>
</div>
<div class="row clearfix">
    To
</div>
<div class="row clearfix">
    <address style="margin-left: 72px;">
        <?php
        echo $model->getNameWithTitle() . ' S/D/W/o ' . $model->fname . '<br />';
        echo $model->postal_address . '<br />';
        echo $model->contact_1 . ' ' . $model->contact_2;
        ?>
    </address>
</div>

<div class="row clearfix">
    <strong>Subject:
        <span class="text-uppercase" style="margin-left: 10px"><u>
                ALLOTMENT ORDER: <?php echo $model->allotment->scheme->name; ?>
            </u></span></strong><br/><br/>
</div>
<div class="row">
    <p class="text-justify">
        Residential Plot No. <?php echo $model->allotment->plot_no; ?>, Street No.
        <?php echo $model->allotment->street_no; ?>
        <?php if (!empty($model->allotment->phase)) : ?>
            , Phase <?php echo $model->allotment->phase; ?>
        <?php endif; ?>
        <?php if (!empty($model->allotment->sector)): ?>
            , Sector <?php echo $model->allotment->sector; ?>
        <?php endif; ?> 
        measuring <?php echo $model->allotment->category->plot_size; ?> marla in the 
        category of <?php echo $model->allotment->category->FullCategory; ?> at
        <?php echo $model->allotment->scheme->name; ?>, is hereby alloted to in 
        ballot draw held on <?php echo $model->allotment->scheme->draw_date; ?>,
        at a total cost of Rs. <?php echo number_format($model->allotment->category->cost); ?>
        (Down Payment of Rs. <?php echo number_format($model->getPaymentAmount($model->allotment->category->payment_types[0]->id)); ?>
        has already been received). Possession shall be given after completion of 
        essential services and payment of all dues.
    </p>
    
    <p>
        2.      Payment schedule for balance amount is as under: 
        <table>
            <tr class="text-center">
                <td></td>
                <td>Amount</td>
                <td>Due Date</td>
            </tr>
            <?php
            foreach ($model->due_dates as $due_date) {
                echo '<tr><td>'. $due_date->payment_type->payment_type . '</td>';
                echo '<td class="text-right">' . number_format($due_date->payment_type->amount) . '</td>';
                echo '<td class="text-right">' . $due_date->date . '</td></tr>';
            }
            ?>
        </table>
                
    </p>
</div>