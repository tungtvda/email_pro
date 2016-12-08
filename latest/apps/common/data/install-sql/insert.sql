--
-- Insert sql for Cyber Fision EMA
--

-- --------------------------------------------------------

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `title`, `slug`, `content`, `status`, `date_added`, `last_updated`) VALUES
(2, 'CAN-SPAM Act: A Compliance Guide for Business', 'can-spam-act-compliance-guide-business', '<p>Do you use email in your business? The CAN-SPAM Act, a law that sets the rules for commercial email, establishes requirements for commercial messages, gives recipients the right to have you stop emailing them, and spells out tough penalties for violations.</p>\n\n<p>Despite its name, the CAN-SPAM Act doesn’t apply just to bulk email. It covers all commercial messages, which the law defines as “any electronic mail message the primary purpose of which is the commercial advertisement or promotion of a commercial product or service,” including email that promotes content on commercial websites. The law makes no exception for business-to-business email. That means all email – for example, a message to former customers announcing a new product line – must comply with the law.</p>\n\n<p>Each separate email in violation of the CAN-SPAM Act is subject to penalties of up to $16,000, so non-compliance can be costly. But following the law isn’t complicated. Here’s a rundown of CAN-SPAM’s main requirements:</p>\n\n<ol style="margin-left:15px;margin-right:0px;"><li><strong>Don’t use false or misleading header information.</strong> Your “From,” “To,” “Reply-To,” and routing information – including the originating domain name and email address – must be accurate and identify the person or business who initiated the message.</li>\n	<li><strong>Don’t use deceptive subject lines.</strong> The subject line must accurately reflect the content of the message.</li>\n	<li><strong>Identify the message as an ad.</strong> The law gives you a lot of leeway in how to do this, but you must disclose clearly and conspicuously that your message is an advertisement.</li>\n	<li><strong>Tell recipients where you’re located.</strong> Your message must include your valid physical postal address. This can be your current street address, a post office box you’ve registered with the U.S. Postal Service, or a private mailbox you’ve registered with a commercial mail receiving agency established under Postal Service regulations.</li>\n	<li><strong>Tell recipients how to opt out of receiving future email from you.</strong> Your message must include a clear and conspicuous explanation of how the recipient can opt out of getting email from you in the future. Craft the notice in a way that’s easy for an ordinary person to recognize, read, and understand. Creative use of type size, color, and location can improve clarity. Give a return email address or another easy Internet-based way to allow people to communicate their choice to you. You may create a menu to allow a recipient to opt out of certain types of messages, but you must include the option to stop all commercial messages from you. Make sure your spam filter doesn’t block these opt-out requests.</li>\n	<li><strong>Honor opt-out requests promptly.</strong> Any opt-out mechanism you offer must be able to process opt-out requests for at least 30 days after you send your message. You must honor a recipient’s opt-out request within 10 business days. You can’t charge a fee, require the recipient to give you any personally identifying information beyond an email address, or make the recipient take any step other than sending a reply email or visiting a single page on an Internet website as a condition for honoring an opt-out request. Once people have told you they don’t want to receive more messages from you, you can’t sell or transfer their email addresses, even in the form of a mailing list. The only exception is that you may transfer the addresses to a company you’ve hired to help you comply with the CAN-SPAM Act.</li>\n	<li><strong>Monitor what others are doing on your behalf.</strong> The law makes clear that even if you hire another company to handle your email marketing, you can’t contract away your legal responsibility to comply with the law. Both the company whose product is promoted in the message and the company that actually sends the message may be held legally responsible.</li>\n</ol>\n \n\n<h3>Need more information?</h3>\nPlease visit <a href="http://www.business.ftc.gov/documents/bus61-can-spam-act-compliance-guide-business" target="_blank">http://www.business.ftc.gov/documents/bus61-can-spam-act-compliance-guide-business</a><br />\n ', 'published', '2013-10-24 11:08:05', '2013-10-25 11:02:06'),
(8, 'Campaign tags and filters', 'campaign-tag-filters', 'When sending a campaign, you are able to use a number of custom tags and filters.<br />\nMost common tags are listed below: <br /><br />\n \n<div class="col-lg-12">\n<table class="table table-bordered table-hover table-striped"><tbody><tr><td>Tag</td>\n			<td>Required</td>\n		</tr><tr><td>[UNSUBSCRIBE_URL]</td>\n			<td>YES</td>\n		</tr><tr><td>[COMPANY_FULL_ADDRESS]</td>\n			<td>YES</td>\n		</tr><tr><td>[UPDATE_PROFILE_URL]</td>\n			<td>NO</td>\n		</tr><tr><td>[WEB_VERSION_URL]</td>\n			<td>NO</td>\n		</tr><tr><td>[CAMPAIGN_URL]</td>\n			<td>NO</td>\n		</tr><tr><td>[LIST_NAME]</td>\n			<td>NO</td>\n		</tr><tr><td>[LIST_SUBJECT]</td>\n			<td>NO</td>\n		</tr><tr><td>[LIST_DESCRIPTION]</td>\n			<td>NO</td>\n		</tr><tr><td>[LIST_FROM_NAME]</td>\n			<td>NO</td>\n		</tr><tr><td>[CURRENT_YEAR]</td>\n			<td>NO</td>\n		</tr><tr><td>[CURRENT_MONTH]</td>\n			<td>NO</td>\n		</tr><tr><td>[CURRENT_DAY]</td>\n			<td>NO</td>\n		</tr><tr><td>[CURRENT_DATE]</td>\n			<td>NO</td>\n		</tr><tr><td>[COMPANY_NAME]</td>\n			<td>NO</td>\n		</tr><tr><td>[COMPANY_ADDRESS_1]</td>\n			<td>NO</td>\n		</tr><tr><td>[COMPANY_ADDRESS_2]</td>\n			<td>NO</td>\n		</tr><tr><td>[COMPANY_CITY]</td>\n			<td>NO</td>\n		</tr><tr><td>[COMPANY_ZONE]</td>\n			<td>NO</td>\n		</tr><tr><td>[COMPANY_ZIP]</td>\n			<td>NO</td>\n		</tr><tr><td>[COMPANY_COUNTRY]</td>\n			<td>NO</td>\n		</tr><tr><td>[COMPANY_PHONE]</td>\n			<td>NO</td>\n		</tr><tr><td>[CAMPAIGN_SUBJECT]</td>\n			<td>NO</td>\n		</tr><tr><td>[CAMPAIGN_TO_NAME]</td>\n			<td>NO</td>\n		</tr><tr><td>[CAMPAIGN_FROM_NAME]</td>\n			<td>NO</td>\n		</tr><tr><td>[CAMPAIGN_REPLY_TO]</td>\n			<td>NO</td>\n		</tr><tr><td>[CAMPAIGN_UID]</td>\n			<td>NO</td>\n		</tr><tr><td>[SUBSCRIBER_UID]</td>\n			<td>NO</td>\n		</tr><tr><td>[EMAIL]</td>\n			<td>NO</td>\n		</tr><tr><td>[FNAME]</td>\n			<td>NO</td>\n		</tr><tr><td>[LNAME]</td>\n			<td>NO</td>\n		</tr></tbody></table></div>\n\n<div class="clearfix"> </div>\nNow, each of the above tags is able to receive a set of filters.<br />\nFilters are a simple way of transforming the tag in a way or another, for example you might want to embed a sharing link to twitter in your campaign, say the campaign url itself.<br /><br />\nUsing only the tags you would embed it like:<br /><br /><code>https://twitter.com/intent/tweet?text=[CAMPAIGN_SUBJECT]&amp;url=[CAMPAIGN_URL] </code><br /><br />\nBut there is a problem, because twitter expects your arguments to be url encoded, and by that, i mean twitter expects to get<br /><br /><code>https://twitter.com/intent/tweet?text=my%20super%20campaign&amp;url=http%3A%2F%2Fwww.domain.com%2Fcampaigns%2F1cart129djat3</code><br /><br />\nbut instead it will get <code>https://twitter.com/intent/tweet?text=my super campaign&amp;url=http://www.domain.com/campaigns/1cart129djat3</code><br /><br />\nIn order to overcome this issue, we will apply filters over our tags, therefore, the twitter url becomes:<br /><br /><code>https://twitter.com/intent/tweet?text=[CAMPAIGN_SUBJECT:filter:urlencode]&amp;url=[CAMPAIGN_URL:filter:urlencode] </code><br /><br />\nPretty simple eh?<br />\nBut we can do even more, let''s say we want to make sure our twitter text starts with a capitalized letter and the rest of the letters will be lowercase.<br />\nIn order to accomplish this, we can apply multiple filters(separate by a pipe) to same tag, for example: <br /><br /><code>https://twitter.com/intent/tweet?text=[CAMPAIGN_SUBJECT:filter:lowercase|ucfirst|urlencode]&amp;url=[CAMPAIGN_URL:filter:urlencode] </code><br />\nPlease note, the order in which you add the filters is the same order they are applied.<br /><br />\nBellow is the entire list of filters, for now there are a few, but in the future the number might increase.\n<div class="clearfix"> </div>\n\n<div class="col-lg-12">\n<table class="table table-bordered table-hover table-striped"><tbody><tr><td>urlencode</td>\n			<td>will urlencode your tag</td>\n		</tr><tr><td>rawurlencode</td>\n			<td>will rawurlencode your url</td>\n		</tr><tr><td>htmlencode</td>\n			<td>will convert html tags into their entities</td>\n		</tr><tr><td>trim</td>\n			<td>will trim the white spaces from begining and end of your tag</td>\n		</tr><tr><td>uppercase</td>\n			<td>will transform your tag in uppercase only chars</td>\n		</tr><tr><td>lowercase</td>\n			<td>will transform your tag in lowercase only chars</td>\n		</tr><tr><td>ucwords</td>\n			<td>will capitalize each first letter from your tag content</td>\n		</tr><tr><td>ucfirst</td>\n			<td>will capitalize only the first letter of your tag</td>\n		</tr><tr><td>reverse</td>\n			<td>will reverse your tag content</td>\n		</tr></tbody></table></div>\n\n<div class="clearfix"> </div>\n', 'published', '2013-10-24 22:47:27', '2013-10-25 11:02:00');

-- --------------------------------------------------------

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`category_id`, `parent_id`, `name`, `slug`, `description`, `status`, `date_added`, `last_updated`) VALUES
(4, NULL, 'Informations', 'informations', '', 'active', '2013-10-25 11:01:50', '2013-10-25 11:01:50');

-- --------------------------------------------------------

--
-- Dumping data for table `article_to_category`
--

INSERT INTO `article_to_category` (`article_id`, `category_id`) VALUES
(2, 4),
(8, 4);

-- --------------------------------------------------------

--
-- Dumping data for table `list_field_type`
--

INSERT INTO `list_field_type` (`type_id`, `name`, `identifier`, `class_alias`, `description`, `date_added`, `last_updated`) VALUES
(1, 'Text', 'text', 'customer.components.field-builder.text.FieldBuilderTypeText', 'Text', '2013-09-01 14:26:26', '2013-09-01 14:26:29'),
(2, 'Dropdown', 'dropdown', 'customer.components.field-builder.dropdown.FieldBuilderTypeDropdown', 'Dropdown', '2013-09-01 14:26:26', '2013-09-01 14:26:29'),
(3, 'Multiselect', 'multiselect', 'customer.components.field-builder.multiselect.FieldBuilderTypeMultiselect', 'Multiselect', '2014-05-27 14:26:26', '2014-05-27 00:00:00'),
(4, 'Date', 'date', 'customer.components.field-builder.date.FieldBuilderTypeDate', 'Date', '2014-05-27 14:26:26', '2014-05-27 00:00:00'),
(5, 'Datetime', 'datetime', 'customer.components.field-builder.datetime.FieldBuilderTypeDatetime', 'Datetime', '2014-05-27 14:26:26', '2014-05-27 00:00:00'),
(6, 'Textarea', 'textarea', 'customer.components.field-builder.textarea.FieldBuilderTypeTextarea', 'Textarea', '2014-05-27 14:26:26', '2014-05-27 00:00:00');

-- --------------------------------------------------------

--
-- Dumping data for table `list_page_type`
--

--
-- Dumping data for table `list_page_type`
--

INSERT INTO `list_page_type` (`type_id`, `name`, `slug`, `description`, `content`, `full_html`, `meta_data`, `date_added`, `last_updated`) VALUES
(1, 'Subscribe form', 'subscribe-form', 'When the user will reach the subscription form, he will see this page .', '<div class="box box-primary">\n<div class="box-header">\n<h3 class="box-title">[LIST_NAME]</h3>\n</div>\n\n<div class="box-body">\n<div class="callout callout-info">We''re happy you decided to subscribe to our email list.<br />\nPlease take a few seconds and fill in the list details in order to subscribe to our list.<br />\nYou will receive an email to confirm your subscription, just to be sure this is your email address.</div>\n[LIST_FIELDS]</div>\n\n<div class="box-footer">\n<div class="pull-right">[SUBMIT_BUTTON]</div>\n\n<div class="clearfix"> </div>\n</div>\n</div>\n', 'no', 0x613a303a7b7d, '2013-09-02 21:47:32', '2014-03-15 14:54:24'),
(2, 'Pending subscribe', 'subscribe-pending', 'After the user will submit the subscription form, he will see this page.', '<div class="box box-primary">\n<div class="box-header">\n<h3 class="box-title">[LIST_NAME]</h3>\n</div>\n\n<div class="box-body">\n<div class="callout callout-info">Please check your email address in order to confirm your subscription.<br />\nThanks.</div>\n</div>\n</div>\n', 'no', 0x613a303a7b7d, '2013-09-02 21:47:56', '2014-03-15 14:54:24'),
(3, 'Subscription confirmed', 'subscribe-confirm', 'After the user will click the confirmation link from within the email, he will see this page.', '<div class="box box-primary">\n<div class="box-header">\n<h3 class="box-title">[LIST_NAME]</h3>\n</div>\n\n<div class="box-body">\n<div class="callout callout-info">Congratulations, your subscription is now complete.<br />\nYou can always update your profile by visiting the following url:<br /><a href="[UPDATE_PROFILE_URL]">Update profile</a></div>\n</div>\n</div>\n', 'no', 0x613a303a7b7d, '2013-09-02 21:48:48', '2014-03-15 14:54:24'),
(4, 'Update Profile', 'update-profile', 'This page will contain all the elements the subscription form contains, the only difference is the heading message.', '<div class="box box-primary">\n<div class="box-header">\n<h3 class="box-title">[LIST_NAME]</h3>\n</div>\n\n<div class="box-body">\n<div class="callout callout-info">Use this form to update your profile information.</div>\n[LIST_FIELDS]</div>\n\n<div class="box-footer">\n<div class="pull-right">[SUBMIT_BUTTON]</div>\n\n<div class="clearfix"> </div>\n</div>\n</div>\n', 'no', 0x613a303a7b7d, '2013-09-02 21:49:40', '2014-03-15 14:54:24'),
(5, 'Unsubscribe form', 'unsubscribe-form', 'This is the form the user will see when following the unsubscribe link.', '<div class="box box-primary">\n<div class="box-header">\n<h3 class="box-title">[LIST_NAME]</h3>\n</div>\n\n<div class="box-body">\n<div class="callout callout-info">We''re sorry to see you go, but hey, no hard feelings, hopefully we will see you back one day.<br />\nPlease fill in your email address in order to unsubscribe from the list.<br />\nYou will receive an email to confirm your unsubscription, just to make sure this is not an accident or somebody else tries to unsubscribe you.</div>\n[UNSUBSCRIBE_EMAIL_FIELD]<br />\n[UNSUBSCRIBE_REASON_FIELD]</div>\n\n<div class="box-footer">\n<div class="pull-right">[SUBMIT_BUTTON]</div>\n\n<div class="clearfix"> </div>\n</div>\n</div>\n', 'no', 0x613a303a7b7d, '2013-09-03 11:18:44', '2014-03-15 14:54:24'),
(6, 'Unsubscribe confirmation', 'unsubscribe-confirm', 'When the user clicks on the unsubscribe link from within the email, he will see this page.', '<div class="box box-primary">\n<div class="box-header">\n<h3 class="box-title">[LIST_NAME]</h3>\n</div>\n\n<div class="box-body">\n<div class="callout callout-info">You were successfully removed from the [LIST_NAME] list.<br />\nHopefully you will come back one day.<br /><br />\nHaving doubts?<br />\nPlease click <a href="[SUBSCRIBE_URL]">here</a> in order to subscribe again to the list.</div>\n</div>\n</div>\n', 'no', 0x613a303a7b7d, '2013-09-03 12:14:37', '2014-03-15 14:54:24'),
(7, 'Subscribe confirm email', 'subscribe-confirm-email', 'The email the user receives with the confirmation link', '<!DOCTYPE html>\n<html><head><title>[LIST_NAME]</title><meta content="utf-8" name="charset"><style type="text/css">\n\n	\n	\n	#outlook a{padding:0;}\n	body {width:100% !important; -webkit-text-size-adjust:none; margin:0; padding:0; font-family:  sans-serif; background: #f5f5f5; font-size:12px;}\n	img {border:0;height:auto;line-height:100%;outline:none;text-decoration:none;}\n	table td{border-collapse:collapse;}\n	a {color: #367fa9;text-decoration:none}\n	a:hover {color: #367fa9;text-decoration:none;}\n	#wrap {background:#f5f5f5; padding:10px;}\n	table#main-table {-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px; border:1px solid #367fa9; overflow:hidden; background: #FFFFFF; width: 600px}\n	h1{padding:0; margin:0; font-family: sans-serif;font-size:25px;font-style:italic;color:#FFFFFF; font-weight:bold;}\n	h1 small{font-size:13px;font-weight:normal; font-family:  sans-serif; font-style:italic;}\n	h6{font-size:10px;color:#FFFFFF;margin:0;padding:0;font-weight:normal}\n	.darkbg {background: #367fa9}\n	input{outline:none}\n</style>\n</head><body dir="undefined" style="width:100%;-webkit-text-size-adjust:none;margin:0;padding:0;font-family:sans-serif;background:#f5f5f5;font-size:12px">\n                \n            <div id="wrap" style="background:#f5f5f5;padding:10px">\n<table align="center" border="0" cellpadding="0" cellspacing="0" id="main-table" style="-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;border:1px solid #367fa9;overflow:hidden;background:#FFFFFF;width:600px"><tbody><tr><td class="darkbg" style="border-collapse:collapse;background:#367fa9">\n			<table border="0" cellpadding="0" cellspacing="20" width="100%"><tbody><tr><td style="border-collapse:collapse">\n						<h1 style="padding:0;margin:0;font-family:sans-serif;font-size:25px;font-style:italic;color:#FFFFFF;font-weight:bold">[LIST_NAME] <small style="font-size:13px;font-weight:normal;font-family:sans-serif;font-style:italic">[COMPANY_NAME]</small></h1>\n						</td>\n					</tr></tbody></table></td>\n		</tr><tr><td style="border-collapse:collapse">\n			<table border="0" cellpadding="20" cellspacing="0" width="100%"><tbody><tr><td style="border-collapse:collapse">&nbsp;</td>\n					</tr><tr><td style="border-collapse:collapse">Please click <a href="[SUBSCRIBE_URL]" style="color:#367fa9;text-decoration:none">here</a> in order to complete your subscription.<br>\n						If for any reason you cannot access the link, please copy the following url into your browser address bar:<br>\n						[SUBSCRIBE_URL]</td>\n					</tr><tr><td style="border-collapse:collapse">&nbsp;</td>\n					</tr></tbody></table></td>\n		</tr><tr><td class="darkbg" style="padding:10px;border-collapse:collapse;background:#367fa9">\n			<h6 style="font-size:10px;color:#FFFFFF;margin:0;padding:0;font-weight:normal">&copy; [CURRENT_YEAR] [COMPANY_NAME]. All rights reserved</h6>\n			</td>\n		</tr></tbody></table></div></body></html>\n', 'yes', 0x613a303a7b7d, '2013-09-05 13:39:56', '2014-03-15 14:54:24'),
(8, 'Unsubscribe confirm email', 'unsubscribe-confirm-email', 'The email the user receives with the confirmation link to unsubscribe', '<!DOCTYPE html>\n<html><head><title>[LIST_NAME]</title><meta content="utf-8" name="charset"><style type="text/css">\n\n	\n	\n	#outlook a{padding:0;}\n	body {width:100% !important; -webkit-text-size-adjust:none; margin:0; padding:0; font-family:  sans-serif; background: #f5f5f5; font-size:12px;}\n	img {border:0;height:auto;line-height:100%;outline:none;text-decoration:none;}\n	table td{border-collapse:collapse;}\n	a {color: #367fa9;text-decoration:none}\n	a:hover {color: #367fa9;text-decoration:none;}\n	#wrap {background:#f5f5f5; padding:10px;}\n	table#main-table {-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px; border:1px solid #367fa9; overflow:hidden; background: #FFFFFF; width: 600px}\n	h1{padding:0; margin:0; font-family: sans-serif;font-size:25px;font-style:italic;color:#FFFFFF; font-weight:bold;}\n	h1 small{font-size:13px;font-weight:normal; font-family:  sans-serif; font-style:italic;}\n	h6{font-size:10px;color:#FFFFFF;margin:0;padding:0;font-weight:normal}\n	.darkbg {background: #367fa9}\n	input{outline:none}\n</style>\n</head><body dir="undefined" style="width:100%;-webkit-text-size-adjust:none;margin:0;padding:0;font-family:sans-serif;background:#f5f5f5;font-size:12px">\n                \n            <div id="wrap" style="background:#f5f5f5;padding:10px">\n<table align="center" border="0" cellpadding="0" cellspacing="0" id="main-table" style="-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;border:1px solid #367fa9;overflow:hidden;background:#FFFFFF;width:600px"><tbody><tr><td class="darkbg" style="border-collapse:collapse;background:#367fa9">\n			<table border="0" cellpadding="0" cellspacing="20" width="100%"><tbody><tr><td style="border-collapse:collapse">\n						<h1 style="padding:0;margin:0;font-family:sans-serif;font-size:25px;font-style:italic;color:#FFFFFF;font-weight:bold">[LIST_NAME] <small style="font-size:13px;font-weight:normal;font-family:sans-serif;font-style:italic">[COMPANY_NAME]</small></h1>\n						</td>\n					</tr></tbody></table></td>\n		</tr><tr><td style="border-collapse:collapse">\n			<table border="0" cellpadding="20" cellspacing="0" width="100%"><tbody><tr><td style="border-collapse:collapse">&nbsp;</td>\n					</tr><tr><td style="border-collapse:collapse">Please click <a href="[UNSUBSCRIBE_URL]" style="color:#367fa9;text-decoration:none">here</a> in order to unsubscribe.<br>\n						If for any reason you cannot access the link, please copy the following url into your browser address bar:<br>\n						[UNSUBSCRIBE_URL]</td>\n					</tr><tr><td style="border-collapse:collapse">&nbsp;</td>\n					</tr></tbody></table></td>\n		</tr><tr><td class="darkbg" style="padding:10px;border-collapse:collapse;background:#367fa9">\n			<h6 style="font-size:10px;color:#FFFFFF;margin:0;padding:0;font-weight:normal">&copy; [CURRENT_YEAR] [COMPANY_NAME]. All rights reserved</h6>\n			</td>\n		</tr></tbody></table></div></body></html>\n', 'yes', 0x613a303a7b7d, '2013-09-05 13:39:56', '2014-03-15 14:54:24'),
(9, 'Welcome email', 'welcome-email', 'The email the user receives after he successfully subscribes into the list', '<!DOCTYPE html>\n<html><head><title>[LIST_NAME]</title><meta content="utf-8" name="charset">\n<style type="text/css">\n#outlook a{padding:0;}\n	body {width:100% !important; -webkit-text-size-adjust:none; margin:0; padding:0; font-family:  sans-serif; background: #f5f5f5; font-size:12px;}\n	img {border:0;height:auto;line-height:100%;outline:none;text-decoration:none;}\n	table td{border-collapse:collapse;}\n	a {color: #367fa9;text-decoration:none}\n	a:hover {color: #367fa9;text-decoration:none;}\n	#wrap {background:#f5f5f5; padding:10px;}\n	table#main-table {-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px; border:1px solid #367fa9; overflow:hidden; background: #FFFFFF; width: 600px}\n	h1{padding:0; margin:0; font-family: sans-serif;font-size:25px;font-style:italic;color:#FFFFFF; font-weight:bold;}\n	h1 small{font-size:13px;font-weight:normal; font-family:  sans-serif; font-style:italic;}\n	h6{font-size:10px;color:#FFFFFF;margin:0;padding:0;font-weight:normal}\n	.darkbg {background: #367fa9}\n	input{outline:none}\n</style>\n</head><body style="width:100%;-webkit-text-size-adjust:none;margin:0;padding:0;font-family:sans-serif;background:#f5f5f5;font-size:12px">\n                \n            <div id="wrap" style="background:#f5f5f5;padding:10px">\n<table align="center" border="0" cellpadding="0" cellspacing="0" id="main-table" style="-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;border:1px solid #367fa9;overflow:hidden;background:#FFFFFF;width:600px"><tbody><tr><td class="darkbg" style="border-collapse:collapse;background:#367fa9">\n			<table border="0" cellpadding="0" cellspacing="20" width="100%"><tbody><tr><td style="border-collapse:collapse">\n						<h1 style="padding:0;margin:0;font-family:sans-serif;font-size:25px;font-style:italic;color:#FFFFFF;font-weight:bold">[LIST_NAME] <small style="font-size:13px;font-weight:normal;font-family:sans-serif;font-style:italic">[COMPANY_NAME]</small></h1>\n						</td>\n					</tr></tbody></table></td>\n		</tr><tr><td style="border-collapse:collapse">\n			<table border="0" cellpadding="20" cellspacing="0" width="100%"><tbody><tr><td style="border-collapse:collapse">&nbsp;</td>\n					</tr><tr><td style="border-collapse:collapse">Thank you for subscribing into [LIST_NAME] email list.<br>\n						You can update your information at any time by clicking <a href="[UPDATE_PROFILE_URL]" style="color:#367fa9;text-decoration:none">here</a>.<br>\n						Thank you.</td>\n					</tr><tr><td style="border-collapse:collapse">&nbsp;</td>\n					</tr></tbody></table></td>\n		</tr><tr><td class="darkbg" style="padding:10px;border-collapse:collapse;background:#367fa9">\n			<h6 style="font-size:10px;color:#FFFFFF;margin:0;padding:0;font-weight:normal">&copy; [CURRENT_YEAR] [COMPANY_NAME]. All rights reserved</h6>\n			</td>\n		</tr></tbody></table></div></body></html>\n', 'yes', 0x613a303a7b7d, '2013-09-05 13:39:56', '2015-03-19 11:13:09'),
(10, 'Subscription confirmed approval', 'subscribe-confirm-approval', 'After the user will click the confirmation link from within the email, if the list requires confirm approval, he will see this page.', '<div class="box box-primary">\n<div class="box-header">\n<h3 class="box-title">[LIST_NAME]</h3>\n</div>\n\n<div class="box-body">\n<div class="callout callout-info">Congratulations, your subscription is now complete and awaiting approval.<br />\nOnce the approval process is done, you will get a confirmation email with further instructions.<br />\nThanks.</div>\n</div>\n</div>\n', 'no', 0x613a303a7b7d, '2013-09-02 21:48:48', '2014-03-15 14:54:24'),
(11, 'Subscription confirmed approval email', 'subscribe-confirm-approval-email', 'The email the user receives after his subscription is approved.', '<!DOCTYPE html>\r\n<html><head><title>[LIST_NAME]</title><meta content="utf-8" name="charset">\r\n<style type="text/css">\r\n#outlook a{padding:0;}\r\n	body {width:100% !important; -webkit-text-size-adjust:none; margin:0; padding:0; font-family:  sans-serif; background: #f5f5f5; font-size:12px;}\r\n	img {border:0;height:auto;line-height:100%;outline:none;text-decoration:none;}\r\n	table td{border-collapse:collapse;}\r\n	a {color: #367fa9;text-decoration:none}\r\n	a:hover {color: #367fa9;text-decoration:none;}\r\n	#wrap {background:#f5f5f5; padding:10px;}\r\n	table#main-table {-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px; border:1px solid #367fa9; overflow:hidden; background: #FFFFFF; width: 600px}\r\n	h1{padding:0; margin:0; font-family: sans-serif;font-size:25px;font-style:italic;color:#FFFFFF; font-weight:bold;}\r\n	h1 small{font-size:13px;font-weight:normal; font-family:  sans-serif; font-style:italic;}\r\n	h6{font-size:10px;color:#FFFFFF;margin:0;padding:0;font-weight:normal}\r\n	.darkbg {background: #367fa9}\r\n	input{outline:none}\r\n</style>\r\n</head><body style="width:100%;-webkit-text-size-adjust:none;margin:0;padding:0;font-family:sans-serif;background:#f5f5f5;font-size:12px">\r\n                \r\n            <div id="wrap" style="background:#f5f5f5;padding:10px">\r\n<table align="center" border="0" cellpadding="0" cellspacing="0" id="main-table" style="-webkit-border-radius:5px;-moz-border-radius:5px;border-radius:5px;border:1px solid #367fa9;overflow:hidden;background:#FFFFFF;width:600px"><tbody><tr><td class="darkbg" style="border-collapse:collapse;background:#367fa9">\r\n			<table border="0" cellpadding="0" cellspacing="20" width="100%"><tbody><tr><td style="border-collapse:collapse">\r\n						<h1 style="padding:0;margin:0;font-family:sans-serif;font-size:25px;font-style:italic;color:#FFFFFF;font-weight:bold">[LIST_NAME] <small style="font-size:13px;font-weight:normal;font-family:sans-serif;font-style:italic">[COMPANY_NAME]</small></h1>\r\n						</td>\r\n					</tr></tbody></table></td>\r\n		</tr><tr><td style="border-collapse:collapse">\r\n			<table border="0" cellpadding="20" cellspacing="0" width="100%"><tbody><tr><td style="border-collapse:collapse">&nbsp;</td>\r\n					</tr><tr><td style="border-collapse:collapse">Congratulations, <br />Your subscription into [LIST_NAME] email list is now approved.<br>\r\n						You can update your information at any time by clicking <a href="[UPDATE_PROFILE_URL]" style="color:#367fa9;text-decoration:none">here</a>.<br>\r\n						Thank you.</td>\r\n					</tr><tr><td style="border-collapse:collapse">&nbsp;</td>\r\n					</tr></tbody></table></td>\r\n		</tr><tr><td class="darkbg" style="padding:10px;border-collapse:collapse;background:#367fa9">\r\n			<h6 style="font-size:10px;color:#FFFFFF;margin:0;padding:0;font-weight:normal">&copy; [CURRENT_YEAR] [COMPANY_NAME]. All rights reserved</h6>\r\n			</td>\r\n		</tr></tbody></table></div></body></html>\r\n', 'yes', 0x613a303a7b7d, '2013-09-05 13:39:56', '2015-03-19 11:13:09');


-- --------------------------------------------------------

--
-- Dumping data for table `list_segment_operator`
--

INSERT INTO `list_segment_operator` (`operator_id`, `name`, `slug`, `date_added`, `last_updated`) VALUES
(1, 'is', 'is', '2013-09-06 16:06:01', '2013-09-06 16:06:01'),
(2, 'is not', 'is-not', '2013-09-06 16:06:01', '2013-09-06 16:06:01'),
(3, 'contains', 'contains', '2013-09-06 16:06:01', '2013-09-06 16:06:01'),
(4, 'not contains', 'not-contains', '2013-09-06 16:06:01', '2013-09-06 16:06:01'),
(5, 'starts with', 'starts', '2013-09-06 16:06:01', '2013-09-06 16:06:01'),
(6, 'ends with', 'ends', '2013-09-06 16:06:01', '2013-09-06 16:06:01'),
(7, 'is greater than', 'greater', '2013-09-06 16:06:01', '2013-09-06 16:06:01'),
(8, 'is less than', 'less', '2013-09-06 16:06:01', '2013-09-06 16:06:01'),
(9, 'not starts with', 'not-starts', '2013-09-06 16:06:01', '2013-09-06 16:06:01'),
(10, 'not ends with', 'not-ends', '2013-09-06 16:06:01', '2013-09-06 16:06:01');

-- --------------------------------------------------------

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`category`, `key`, `value`, `is_serialized`, `date_added`, `last_updated`) VALUES
('system', 'common', 0x6170705f6e616d65, 0, '2013-10-29 23:31:29', '2013-10-29 23:31:29'),
('system.campaign.attachments', 'allowed_extensions', 0x613a393a7b693a303b733a333a22706466223b693a313b733a333a22646f63223b693a323b733a343a22646f6378223b693a333b733a333a22786c73223b693a343b733a343a22786c7378223b693a353b733a333a22707074223b693a363b733a343a2270707478223b693a373b733a333a227a6970223b693a383b733a333a22726172223b7d, 1, '2014-01-14 09:57:08', '2014-01-18 11:09:50'),
('system.campaign.attachments', 'allowed_files_count', 0x35, 0, '2014-01-14 10:07:14', '2014-01-14 10:07:14'),
('system.campaign.attachments', 'allowed_file_size', 0x31303438353736, 0, '2014-01-14 10:07:14', '2014-01-14 10:12:53'),
('system.campaign.attachments', 'allowed_mime_types', 0x613a34313a7b693a303b733a31353a226170706c69636174696f6e2f706466223b693a313b733a31373a226170706c69636174696f6e2f782d706466223b693a323b733a31393a226170706c69636174696f6e2f6163726f626174223b693a333b733a32303a226170706c69636174696f6e732f766e642e706466223b693a343b733a383a22746578742f706466223b693a353b733a31303a22746578742f782d706466223b693a363b733a31383a226170706c69636174696f6e2f6d73776f7264223b693a373b733a31353a226170706c69636174696f6e2f646f63223b693a383b733a393a226170706c2f74657874223b693a393b733a32323a226170706c69636174696f6e2f766e642e6d73776f7264223b693a31303b733a32333a226170706c69636174696f6e2f766e642e6d732d776f7264223b693a31313b733a31393a226170706c69636174696f6e2f77696e776f7264223b693a31323b733a31363a226170706c69636174696f6e2f776f7264223b693a31333b733a31383a226170706c69636174696f6e2f782d6d737736223b693a31343b733a32303a226170706c69636174696f6e2f782d6d73776f7264223b693a31353b733a37313a226170706c69636174696f6e2f766e642e6f70656e786d6c666f726d6174732d6f6666696365646f63756d656e742e776f726470726f63657373696e676d6c2e646f63756d656e74223b693a31363b733a32343a226170706c69636174696f6e2f766e642e6d732d657863656c223b693a31373b733a31393a226170706c69636174696f6e2f6d73657863656c223b693a31383b733a32313a226170706c69636174696f6e2f782d6d73657863656c223b693a31393b733a32323a226170706c69636174696f6e2f782d6d732d657863656c223b693a32303b733a31393a226170706c69636174696f6e2f782d657863656c223b693a32313b733a32363a226170706c69636174696f6e2f782d646f735f6d735f657863656c223b693a32323b733a31353a226170706c69636174696f6e2f786c73223b693a32333b733a36353a226170706c69636174696f6e2f766e642e6f70656e786d6c666f726d6174732d6f6666696365646f63756d656e742e73707265616473686565746d6c2e7368656574223b693a32343b733a32393a226170706c69636174696f6e2f766e642e6d732d706f776572706f696e74223b693a32353b733a32343a226170706c69636174696f6e2f6d73706f776572706f696e74223b693a32363b733a32353a226170706c69636174696f6e2f6d732d706f776572706f696e74223b693a32373b733a32323a226170706c69636174696f6e2f6d73706f776572706e74223b693a32383b733a32383a226170706c69636174696f6e2f766e642d6d73706f776572706f696e74223b693a32393b733a32323a226170706c69636174696f6e2f706f776572706f696e74223b693a33303b733a32343a226170706c69636174696f6e2f782d706f776572706f696e74223b693a33313b733a31353a226170706c69636174696f6e2f782d6d223b693a33323b733a37333a226170706c69636174696f6e2f766e642e6f70656e786d6c666f726d6174732d6f6666696365646f63756d656e742e70726573656e746174696f6e6d6c2e70726573656e746174696f6e223b693a33333b733a31353a226170706c69636174696f6e2f7a6970223b693a33343b733a31373a226170706c69636174696f6e2f782d7a6970223b693a33353b733a32383a226170706c69636174696f6e2f782d7a69702d636f6d70726573736564223b693a33363b733a32343a226170706c69636174696f6e2f6f637465742d73747265616d223b693a33373b733a32323a226170706c69636174696f6e2f782d636f6d7072657373223b693a33383b733a32343a226170706c69636174696f6e2f782d636f6d70726573736564223b693a33393b733a31353a226d756c7469706172742f782d7a6970223b693a34303b733a32383a226170706c69636174696f6e2f782d7261722d636f6d70726573736564223b7d, 1, '2014-01-14 09:57:08', '2014-01-18 11:09:50'),
('system.campaign.attachments', 'enabled', 0x6e6f, 0, '2014-01-14 09:57:08', '2014-01-14 10:09:42'),
('system.common', 'api_status', 0x6f6e6c696e65, 0, '2013-10-16 11:37:11', '2013-10-16 11:37:20'),
('system.common', 'app_name', 0x4d61696c57697a7a20454d53, 0, '2013-10-29 23:33:18', '2013-10-29 23:33:18'),
('system.common', 'app_version', 0x312e30, 0, '2013-10-29 23:33:18', '2013-10-29 23:33:18'),
('system.common', 'clean_urls', 0x30, 0, '2013-09-04 09:43:07', '2013-11-01 13:43:11'),
('system.common', 'site_description', 0x456d61696c206d61726b6574696e67206170706c69636174696f6e, 0, '2013-09-04 08:47:17', '2013-10-26 19:39:46'),
('system.common', 'site_keywords', 0x656d61696c2c206d61726b6574696e672c20656d61696c206d61726b6574696e672c20656d61696c2064656c69766572792c2064656c69766572792c20696e626f782064656c6976657279, 0, '2013-09-04 08:47:17', '2013-10-26 20:06:12'),
('system.common', 'site_name', 0x4d61696c57697a7a, 0, '2013-09-04 08:39:08', '2013-09-04 08:39:08'),
('system.common', 'site_offline_message', 0x4170706c69636174696f6e2063757272656e746c79206f66666c696e652e2054727920616761696e206c6174657221, 0, '2013-09-22 23:26:00', '2013-09-22 23:26:40'),
('system.common', 'site_status', 0x6f6e6c696e65, 0, '2013-09-22 22:47:38', '2013-10-14 00:03:42'),
('system.common', 'site_tagline', 0x456d61696c206d61726b6574696e67206170706c69636174696f6e, 0, '2013-09-04 08:39:08', '2013-10-26 19:39:46'),
('system.cron.process_delivery_bounce', 'max_fatal_errors', 0x31, 0, '2013-10-07 11:36:23', '2013-10-22 20:32:22'),
('system.cron.process_delivery_bounce', 'max_hard_bounce', 0x31, 0, '2013-10-07 11:36:23', '2013-10-22 20:32:22'),
('system.cron.process_delivery_bounce', 'max_soft_bounce', 0x35, 0, '2013-10-07 11:36:23', '2013-10-07 11:36:23'),
('system.cron.process_delivery_bounce', 'max_soft_errors', 0x35, 0, '2013-10-07 11:36:23', '2013-10-07 11:36:23'),
('system.cron.process_delivery_bounce', 'memory_limit', '', 0, '2013-10-07 11:36:23', '2013-11-01 13:42:47'),
('system.cron.process_delivery_bounce', 'process_at_once', 0x313030, 0, '2013-10-07 11:36:23', '2013-10-07 11:36:23'),
('system.cron.send_campaigns', 'campaigns_at_once', 0x35, 0, '2013-10-07 11:12:18', '2013-11-01 13:41:55'),
('system.cron.send_campaigns', 'change_server_at', 0x323030, 0, '2013-10-07 13:08:56', '2013-10-16 23:56:27'),
('system.cron.send_campaigns', 'emails_per_minute', 0x313030, 0, '2013-10-07 11:12:18', '2013-10-07 11:12:18'),
('system.cron.send_campaigns', 'memory_limit', '', 0, '2013-10-07 11:12:18', '2013-11-01 13:42:47'),
('system.cron.send_campaigns', 'parallel_processes_per_campaign', 0x33, 0, '2014-02-16 22:39:58', '2014-02-16 22:39:58'),
('system.cron.send_campaigns', 'pause', 0x3130, 0, '2013-10-07 11:12:18', '2013-10-08 23:57:33'),
('system.cron.send_campaigns', 'send_at_once', 0x3530, 0, '2013-10-07 11:12:18', '2013-11-01 13:41:55'),
('system.cron.send_campaigns', 'subscribers_at_once', 0x313030, 0, '2013-10-07 11:12:18', '2013-11-01 13:41:55'),
('system.email_blacklist', 'local_check', 0x796573, 0, '2014-01-09 14:48:41', '2014-01-09 15:18:22'),
('system.email_blacklist', 'remote_check', 0x6e6f, 0, '2014-01-09 14:48:41', '2014-01-09 21:45:18'),
('system.email_blacklist', 'remote_dnsbls', 0x613a323a7b693a303b733a31343a22626c2e7370616d636f702e6e6574223b693a313b733a31363a227a656e2e7370616d686175732e6f7267223b7d, 1, '2014-01-09 14:48:41', '2014-01-09 16:21:11'),
('system.email_templates', 'common', 0x3c21444f43545950452068746d6c3e0a3c68746d6c3e3c686561643e3c7469746c653e4d61696c57697a7a3c2f7469746c653e3c6d65746120636f6e74656e743d227574662d3822206e616d653d2263686172736574223e0a3c7374796c6520747970653d22746578742f637373223e0a236f75746c6f6f6b20617b70616464696e673a303b7d0a09626f6479207b77696474683a313030252021696d706f7274616e743b202d7765626b69742d746578742d73697a652d61646a7573743a6e6f6e653b206d617267696e3a303b2070616464696e673a303b20666f6e742d66616d696c793a20274f70656e2053616e73272c2073616e732d73657269663b206261636b67726f756e643a20236635663566353b20666f6e742d73697a653a313270783b7d0a09696d67207b626f726465723a303b6865696768743a6175746f3b6c696e652d6865696768743a313030253b6f75746c696e653a6e6f6e653b746578742d6465636f726174696f6e3a6e6f6e653b7d0a097461626c652074647b626f726465722d636f6c6c617073653a636f6c6c617073653b7d0a0961207b636f6c6f723a20233336376661393b746578742d6465636f726174696f6e3a6e6f6e657d0a09613a686f766572207b636f6c6f723a20233336376661393b746578742d6465636f726174696f6e3a6e6f6e653b7d0a3c2f7374796c653e0a3c2f686561643e3c626f6479206267636f6c6f723d222366356635663522206469723d22756e646566696e656422207374796c653d2277696474683a313030253b2d7765626b69742d746578742d73697a652d61646a7573743a6e6f6e653b6d617267696e3a303b70616464696e673a303b666f6e742d66616d696c793a26616d703b233033393b4f70656e2053616e7326616d703b233033393b2c73616e732d73657269663b6261636b67726f756e643a236635663566353b666f6e742d73697a653a31327078223e0a202020202020202020202020202020200a2020202020202020202020203c646976207374796c653d226261636b67726f756e643a236635663566353b70616464696e673a313070783b223e0a3c7461626c6520616c69676e3d2263656e74657222206267636f6c6f723d22234646464646462220626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d223022207374796c653d222d7765626b69742d626f726465722d7261646975733a3570783b2d6d6f7a2d626f726465722d7261646975733a3570783b626f726465722d7261646975733a3570783b626f726465723a31707820736f6c696420233336376661393b6f766572666c6f773a68696464656e3b222077696474683d22363030223e3c74626f64793e3c74723e3c7464206267636f6c6f723d222333363766613922207374796c653d22626f726465722d636f6c6c617073653a636f6c6c617073653b223e0a0909093c7461626c6520626f726465723d2230222063656c6c70616464696e673d2230222063656c6c73706163696e673d223230222077696474683d2231303025223e3c74626f64793e3c74723e3c7464207374796c653d22666f6e742d73697a653a323570783b666f6e742d7374796c653a6974616c69633b626f726465722d636f6c6c617073653a636f6c6c617073653b223e3c666f6e7420636f6c6f723d2223464646464646223e3c7370616e207374796c653d22666f6e742d66616d696c793a274e6f746f2053616e73272c2073616e732d73657269663b223e3c7374726f6e673e4d61696c57697a7a3c2f7374726f6e673e3c2f7370616e3e203c7370616e207374796c653d22666f6e742d73697a653a3530253b666f6e742d66616d696c793a274f70656e2053616e73272c2073616e732d73657269663b223e456d61696c206d61726b6574696e67206170706c69636174696f6e3c2f7370616e3e3c2f666f6e743e3c2f74643e0a09090909093c2f74723e3c2f74626f64793e3c2f7461626c653e3c2f74643e0a09093c2f74723e3c74723e3c7464207374796c653d22626f726465722d636f6c6c617073653a636f6c6c617073653b223e0a0909093c7461626c6520626f726465723d2230222063656c6c70616464696e673d223230222063656c6c73706163696e673d2230222077696474683d2231303025223e3c74626f64793e3c74723e3c7464207374796c653d22626f726465722d636f6c6c617073653a636f6c6c617073653b223e266e6273703b3c2f74643e0a09090909093c2f74723e3c74723e3c7464207374796c653d22666f6e742d66616d696c793a274f70656e2053616e73272c2073616e732d73657269663b666f6e742d73697a653a313270783b626f726465722d636f6c6c617073653a636f6c6c617073653b223e5b434f4e54454e545d3c2f74643e0a09090909093c2f74723e3c74723e3c7464207374796c653d22626f726465722d636f6c6c617073653a636f6c6c617073653b223e266e6273703b3c2f74643e0a09090909093c2f74723e3c2f74626f64793e3c2f7461626c653e3c2f74643e0a09093c2f74723e3c74723e3c7464206267636f6c6f723d222333363766613922207374796c653d2270616464696e673a313070783b626f726465722d636f6c6c617073653a636f6c6c617073653b223e3c666f6e7420636f6c6f723d2223464646464646223e3c7370616e207374796c653d22666f6e742d73697a653a313070783b666f6e742d66616d696c793a274f70656e2053616e73272c2073616e732d73657269663b223e26636f70793b2032303133204d61696c57697a7a2e20416c6c207269676874732072657365727665643c2f7370616e3e3c2f666f6e743e3c2f74643e0a09093c2f74723e3c2f74626f64793e3c2f7461626c653e3c2f6469763e3c2f626f64793e3c2f68746d6c3e0a, 0, '2013-10-14 10:18:10', '2014-03-15 14:39:58'),
('system.exporter', 'memory_limit', '', 0, '2013-09-29 22:23:10', '2013-11-01 13:42:33'),
('system.exporter', 'pause', 0x31, 0, '2013-09-29 22:23:10', '2013-09-29 22:24:41'),
('system.exporter', 'process_at_once', 0x3530, 0, '2013-09-29 22:23:10', '2013-09-29 22:24:41'),
('system.exporter', 'records_per_file', 0x353030, 0, '2013-09-29 22:23:10', '2013-09-29 22:52:51'),
('system.extension.ckeditor', 'status', 0x656e61626c6564, 0, '2013-11-07 10:33:38', '2013-11-07 10:33:38'),
('system.importer', 'file_size_limit', 0x31303438353736, 0, '2013-09-28 11:51:35', '2013-11-01 13:42:33'),
('system.importer', 'import_at_once', 0x313030, 0, '2013-09-28 11:51:35', '2013-11-01 13:42:33'),
('system.importer', 'memory_limit', '', 0, '2013-09-28 11:51:35', '2013-11-01 13:42:33'),
('system.importer', 'pause', 0x31, 0, '2013-09-28 11:51:35', '2013-11-01 13:42:33');

-- --------------------------------------------------------

--
-- Dumping data for table `tag_registry`
--

INSERT INTO `tag_registry` (`tag_id`, `tag`, `description`, `date_added`, `last_updated`) VALUES
(NULL, '[LIST_NAME]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[LIST_FIELDS]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[UNSUBSCRIBE_EMAIL_FIELD]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[UPDATE_PROFILE_URL]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[CURRENT_YEAR]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[SUBSCRIBE_URL]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[CHARSET]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[UNSUBSCRIBE_URL]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[SUBMIT_BUTTON]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[COMPANY_NAME]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[COMPANY_COUNTRY]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[COMPANY_ZONE]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[COMPANY_CITY]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[COMPANY_ADDRESS_1]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[COMPANY_PHONE]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[COMPANY_ADDRESS_2]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[CURRENT_MONTH]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[CURRENT_DAY]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[CURRENT_DATE]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[WEB_VERSION_URL]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[LIST_DESCRIPTION]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[LIST_FROM_NAME]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[CAMPAIGN_SUBJECT]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[CAMPAIGN_FROM_NAME]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[CAMPAIGN_REPLY_TO]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[COMPANY_FULL_ADDRESS]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[COMPANY_ZIP]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[CAMPAIGN_TO_NAME]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[LIST_SUBJECT]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[CAMPAIGN_URL]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[CAMPAIGN_UID]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[SUBSCRIBER_UID]', NULL, '2013-10-25 03:08:28', '2013-10-25 03:08:28'),
(NULL, '[XML_FEED_BEGIN]', NULL, '2013-12-09 00:00:00', '2013-12-09 00:00:00'),
(NULL, '[XML_FEED_ITEM_LINK]', NULL, '2013-12-09 00:00:00', '2013-12-09 00:00:00'),
(NULL, '[XML_FEED_ITEM_IMAGE]', NULL, '2013-12-09 00:00:00', '2013-12-09 00:00:00'),
(NULL, '[XML_FEED_ITEM_TITLE]', NULL, '2013-12-09 00:00:00', '2013-12-09 00:00:00'),
(NULL, '[XML_FEED_ITEM_DESCRIPTION]', NULL, '2013-12-09 00:00:00', '2013-12-09 00:00:00'),
(NULL, '[XML_FEED_END]', NULL, '2013-12-09 00:00:00', '2013-12-09 00:00:00'),
(NULL, '[XML_FEED_ITEM_PUBDATE]', NULL, '2013-12-09 00:00:00', '2013-12-09 00:00:00'),
(NULL, '[XML_FEED_ITEM_GUID]', NULL, '2013-12-09 00:00:00', '2013-12-09 00:00:00'),
(NULL, '[JSON_FEED_BEGIN]', NULL, '2013-12-09 00:00:00', '2013-12-09 00:00:00'),
(NULL, '[JSON_FEED_ITEM_LINK]', NULL, '2013-12-09 00:00:00', '2013-12-09 00:00:00'),
(NULL, '[JSON_FEED_ITEM_IMAGE]', NULL, '2013-12-09 00:00:00', '2013-12-09 00:00:00'),
(NULL, '[JSON_FEED_ITEM_TITLE]', NULL, '2013-12-09 00:00:00', '2013-12-09 00:00:00'),
(NULL, '[JSON_FEED_ITEM_DESCRIPTION]', NULL, '2013-12-09 00:00:00', '2013-12-09 00:00:00'),
(NULL, '[JSON_FEED_END]', NULL, '2013-12-09 00:00:00', '2013-12-09 00:00:00'),
(NULL, '[JSON_FEED_ITEM_PUBDATE]', NULL, '2013-12-09 00:00:00', '2013-12-09 00:00:00'),
(NULL, '[JSON_FEED_ITEM_GUID]', NULL, '2013-12-09 00:00:00', '2013-12-09 00:00:00'),
(NULL, '[XML_FEED_ITEM_CONTENT]', NULL, '2013-12-09 00:00:00', '2013-12-09 00:00:00'),
(NULL, '[JSON_FEED_ITEM_CONTENT]', NULL, '2013-12-09 00:00:00', '2013-12-09 00:00:00'),
(NULL, '[CAMPAIGN_FROM_EMAIL]', NULL, '2014-02-02 00:00:00', '2014-02-02 00:00:00'),
(NULL, '[LIST_FROM_EMAIL]', NULL, '2014-02-02 00:00:00', '2014-02-02 00:00:00'),
(NULL, '[SUBSCRIBER_DATE_ADDED]', NULL, '2014-06-23 00:00:00', '2014-06-23 00:00:00'),
(NULL, '[SUBSCRIBER_DATE_ADDED_LOCALIZED]', NULL, '2014-06-23 00:00:00', '2014-06-23 00:00:00'),
(NULL, '[DATE]', NULL, '2014-06-23 00:00:00', '2014-06-23 00:00:00'),
(NULL, '[DATETIME]', NULL, '2014-06-23 00:00:00', '2014-06-23 00:00:00'),
(NULL, '[FORWARD_FRIEND_URL]', NULL, '2014-08-31 00:00:00', '2014-08-31 00:00:00'),
(NULL, '[CAMPAIGN_NAME]', NULL, '2014-08-31 00:00:00', '2014-08-31 00:00:00'),
(NULL, '[DIRECT_UNSUBSCRIBE_URL]', NULL, '2014-08-31 00:00:00', '2014-08-31 00:00:00'),
(NULL, '[RANDOM_CONTENT]', NULL, '2014-11-18 00:00:00', '2014-11-18 00:00:00'),
(NULL, '[CAMPAIGN_REPORT_ABUSE_URL]', NULL, '2014-11-18 00:00:00', '2014-11-18 00:00:00');

-- --------------------------------------------------------

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currency_id`, `name`, `code`, `value`, `is_default`, `status`, `date_added`, `last_updated`) VALUES
(1, 'US Dollar', 'USD', '1.00000000', 'yes', 'active', '2014-05-17 00:00:00', '2014-05-17 00:00:00');

-- --------------------------------------------------------

--
-- Dumping data for table `company_type`
--

INSERT INTO `company_type` (`type_id`, `name`, `date_added`, `last_updated`) VALUES
(NULL, 'Agriculture and Food Services', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Architecture and Construction', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Arts and Artists', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Beauty and Personal Care', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Business and Finance', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Computers and Electronics', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Construction ', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Consulting', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Creative Services/Agency', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Daily Deals/E-Coupons', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'eCommerce', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Education and Training', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Entertainment and Events', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Gambling', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Games', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Government', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Health and Fitness', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Hobbies', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Home and Garden', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Insurance', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Legal', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Manufacturing', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Marketing and Advertising', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Media and Publishing', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Medical, Dental, and Healthcare', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Mobile', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Music and Musicians', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Non-Profit', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Pharmaceuticals', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Photo and Video', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Politics', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Professional Services', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Public Relations', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Real Estate', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Recruitment and Staffing', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Religion', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Restaurant and Venue', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Retail', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Social Networks and Online Communities', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Software and Web App', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Sports', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Telecommunications', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Travel and Transportation', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Vitamin supplements', '2014-08-31 09:45:05', '2014-08-31 09:45:05'),
(NULL, 'Other', '2014-08-31 09:45:05', '2014-08-31 09:45:05');

-- --------------------------------------------------------
