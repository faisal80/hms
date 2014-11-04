<?php $this->layout = 'print'; ?>
<div class="row clearfix">
    <strong><em><u><?php echo $reminder; ?></u></em></strong>
    <img style="float: left; height: 100px;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/kpk-logo.jpg"/>

    <div class="text-center pull-right" style="width: 350px;">
        <address>
            <strong><span style="font-size: 12pt; font-family: 'Bookman Old Style'">
                    OFFICE OF THE DIRECTOR GENERAL<br />
                    PROVINCIAL HOUSING AUTHORITY</span></strong><br />
            (ATI Campus) Jamrud Road, Peshawar<br />
            <small>Phone: +92 91 9218265 &nbsp; Fax: +92 91 9218420</small><br />
            <small>Website: www.housingkp.gov.pk &nbsp; Email: dg.pha@hotmail.com</small>
        </address>
    </div>
</div>
<div class="text-right" id="ref" style="font-size: 12px; line-height: 13px;">
    No. DG/PHA/____________________________<br />
    Dated: <?php echo date(Yii::app()->user->getDateFormat(false)); ?>
</div>
<div class="row clearfix" style="font-size: 12px; line-height: 13px;">
    To
</div>
<div class="row clearfix" style="font-size: 12px; line-height: 13px;">
    <address style="margin-left: 72px;">
        <?php
        echo $data['name'] . ' S/D/W/o ' . $data['fname'] . '<br />';
        echo $data['postal_address'] . '<br />';
        echo $data['contact_1'] . ' ' . $data['contact_2'];
        ?>
    </address>
</div>

<div class="row clearfix" style="font-size: 12px; line-height: 13px;">
    <strong>Subject:
        <span class="text-uppercase" style="margin-left: 22px"><u>
                <?php echo strtoupper($data['payment_type'] . ' FOR '. $scheme); ?>
            </u></span></strong><br/><br/>
</div>
<div class="row text-justify" style="font-size: 12px; line-height: 13px;">
    <p style="text-indent: 72px">
        Please refer to PHA's Allotment Order No. <?php echo $data['order_no']; ?>
        dated <?php echo $data['adate']; ?>. You were alloted Plot No. <?php echo $data['plot_no'];?>,
        Street No.<?php echo $data['street_no']; ?>,
        <?php 
        if (!empty($data['phase']))
            echo ' Phase ' . $data['phase'];
        if (!empty($data['sector']))
            echo ', Sector ' . $data['sector']; ?>
        measuring <?php echo $data['plot_size'];
        echo ($data['corner'] ? ' (corner)' : '');
        ?> in the 
        category of <?php echo $data['category']; ?>. 
        <?php echo $data['payment_type']; ?> of Rs.<?php echo number_format($data['amount']);?>/- 
        was due on <?php echo $data['ddate'];?>. But till date you have not deposited
        <?php echo $data['payment_type'];?>.
    </p>

    <p>
        2.<span style="margin-left: 61px">You are directed to deposit <?php echo $data['payment_type']; ?> 
            amounting to Rs. <?php echo number_format($data['amount']); ?>/- plus Rs.99999/- as a 
        penalty @ (2% per month) for each day of delay for the amount in default. 
        Failure to pay the installment along with penalty charges within 12 months
        shall make your allotment liable to cancellation without any notice.</span>

    </p>

<div class="text-center pull-right" style="width: 200px; margin-top: 35px;">
    <strong>Housing Officer-II</strong><br />
    Provincial Housing Authority
</div>
</div>