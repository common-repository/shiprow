<?php

global $wpdb;

//require_once ABSPATH . 'wp-admin/includes/upgrade.php';

//$charset_collate = $wpdb->get_charset_collate();

/**

 * [ product_settings custom table used for store woocommerce product data ]

 * @var [type]

 */
// -----------------shipping rules--------------------
$shipping_rules_name = $wpdb->prefix.'shipping_rules';

$sql = "CREATE TABLE  if not exists `$shipping_rules_name` (

  `id` int(11) NOT NULL AUTO_INCREMENT ,

  `shop` varchar(100) NOT NULL,

  `rule_name` varchar(100) NOT NULL,

  `internal_description` text DEFAULT NULL,

  `custom_shipping_methods` blob DEFAULT NULL,

  `live_shipping_methods` blob DEFAULT NULL,

  `action_to_perform` varchar(100) DEFAULT NULL,

  `in_order_to` blob DEFAULT NULL,

  `apply_this_rate` varchar(100) DEFAULT NULL,

  `apply_shipping_groups` varchar(100) DEFAULT NULL,

  `weight_price_quantity` varchar(100) DEFAULT NULL,

  `zone_include` varchar(100) DEFAULT NULL,

  `zone_donot_include` varchar(100) DEFAULT NULL,

  `shipping_groups_include_all` varchar(100) DEFAULT NULL,

  `shipping_groups_include_one_or_more` varchar(100) DEFAULT NULL,

  `shipping_groups_donot_include` varchar(100) DEFAULT NULL,

  `customer_groups_include` varchar(100) DEFAULT NULL,

  `valid_from` varchar(100) DEFAULT NULL,

  `valid_to` varchar(100) DEFAULT NULL,

  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),

  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',

  PRIMARY KEY (`id`),

  KEY `store_name` (`shop`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

$wpdb->query($sql);

//shippinng zones table
$shipping_zones_name = $wpdb->prefix.'shipping_zones';

$sql = "CREATE TABLE  if not exists `$shipping_zones_name` (

  `id` int(11) NOT NULL AUTO_INCREMENT ,

  `shop` varchar(100) NOT NULL,

  `zone_name` varchar(100) NOT NULL,

  `internal_description` text DEFAULT NULL,

  `country` varchar(100) DEFAULT NULL,

  `zipcode` varchar(100) DEFAULT NULL,

  `state` varchar(100) DEFAULT NULL,

  `for_states` varchar(100) DEFAULT NULL,

  `city` varchar(100) DEFAULT NULL,

  `for_cities` varchar(100) DEFAULT NULL,

  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),

  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',

  PRIMARY KEY (`id`),

  KEY `store_name` (`shop`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

$wpdb->query($sql);

//shippinng groups table
$shipping_groups_name = $wpdb->prefix.'shipping_groups';

$sql = "CREATE TABLE  if not exists `$shipping_groups_name` (

  `id` int(11) NOT NULL AUTO_INCREMENT ,

  `shop` varchar(100) NOT NULL,

  `group_name` varchar(100) NOT NULL,

  `internal_description` text DEFAULT NULL,

  `custom_shipping_methods` blob DEFAULT NULL,

  `live_shipping_methods` blob DEFAULT NULL,

  `freight_class`  varchar(100) DEFAULT NULL,

  `shipping_zone`  int(11) DEFAULT NULL,

  `sku_shipping_group`  tinyint(1) DEFAULT NULL,

  `must_ship_freight`  tinyint(1) DEFAULT NULL,

  `exclude_carrier_weight_threshold`  tinyint(1) DEFAULT NULL,

  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),

  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',

  PRIMARY KEY (`id`),

  KEY `store_name` (`shop`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

$wpdb->query($sql);

//filters table
$filters_name = $wpdb->prefix.'filters';

$sql = "CREATE TABLE  if not exists `$filters_name` (

  `id` int(11) NOT NULL AUTO_INCREMENT ,

  `shop` varchar(100) NOT NULL,

  `filter_name` varchar(100) NOT NULL,

  `internal_description` text DEFAULT NULL,

  `applies_to` varchar(100) DEFAULT NULL,

  `shipping_group_applies_to` varchar(100) DEFAULT NULL,

  `filter_price` blob DEFAULT NULL,

  `filter_weight` blob DEFAULT NULL,
  
  `filter_quantity` blob DEFAULT NULL,

  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),

  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',

  PRIMARY KEY (`id`),

  KEY `store_name` (`shop`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

$wpdb->query($sql);
// ----------------shipping rules end------------------
//Product setting table -- used for product tab and store product datt

$sql = "CREATE TABLE  if not exists {$wpdb->prefix}product_settings  (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `shop` varchar(200) COLLATE utf8_unicode_ci NOT NULL,

  `product_id` bigint(20) NOT NULL,

  `variant_id` bigint(20) NOT NULL,

  `product_title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,

  `variant_title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,

  `nmfc` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,

  `freight_enable` tinyint(1) NOT NULL DEFAULT 0,

  `small_enable` tinyint(1) NOT NULL,

  `product_freight_class` varchar(20) COLLATE utf8_unicode_ci NOT NULL,

  `product_weight` varchar(13) COLLATE utf8_unicode_ci NOT NULL,

  `product_width` varchar(6) COLLATE utf8_unicode_ci NOT NULL,

  `product_height` varchar(6) COLLATE utf8_unicode_ci NOT NULL,

  `product_length` varchar(6) COLLATE utf8_unicode_ci NOT NULL,

  `hazardous_enable` tinyint(4) NOT NULL,

  `hz_un_number_header` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,

  `hz_un_number` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,

  `hazmat_class` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,

  `hz_em_contact_phone` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,

  `hz_packaging_group` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,

  `dropship_enable` tinyint(4) NOT NULL,

  `dropship_location` int(11) DEFAULT NULL,

  `product_sku` varchar(200) COLLATE utf8_unicode_ci NOT NULL,

  `handle` varchar(200) COLLATE utf8_unicode_ci NOT NULL,

  `hazmat_details` blob DEFAULT NULL,

  `shipping_rate` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,

  `additional_settings` blob DEFAULT NULL,

  `created_at` datetime NOT NULL DEFAULT current_timestamp(),

  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),

  	PRIMARY KEY (`id`),

	KEY `product_id` (`product_id`),

	KEY `variant_id` (`variant_id`),

	KEY `shop` (`shop`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

$wpdb->query($sql);

//store setting table -- this table is used for store setting [connectionsetting and quote setting]

$store_table_name = $wpdb->prefix.'store_settings';

$sql = "CREATE TABLE  if not exists `$store_table_name` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `carrier_id` int(11) NOT NULL,

  `shop` varchar(300) COLLATE utf8_unicode_ci NOT NULL,

  `account_number` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,

  `username` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,

  `password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,

  `license_key` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,

  `authentication_key` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,

  `carriers` blob DEFAULT NULL,

  `quote_settings` blob DEFAULT NULL,

  `status` tinyint(1)  DEFAULT NULL,

  `fedex_account_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,

  `otherSettings` blob  DEFAULT NULL,

  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),

  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),

  PRIMARY KEY (`id`),

  KEY `store_name` (`shop`)

) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

$wpdb->query($sql);

//common_setting
$common_settings = $wpdb->prefix.'common_settings';

$sql = "CREATE TABLE  if not exists `$common_settings` (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `shop` varchar(300) COLLATE utf8_unicode_ci NOT NULL,

  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,

  `rad` tinyint(1)  DEFAULT NULL,

  `binpackaging` tinyint(1)  DEFAULT NULL,

  `rad_requests` int(11)  DEFAULT NULL,

  `rad_free_requests` int(11)  DEFAULT NULL,

  `total_balance` double  DEFAULT 0,

  `used_balance` double  DEFAULT 0,

  `remaining_balance` double  DEFAULT 0,

  `subscription_id` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,

  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),

  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),

  PRIMARY KEY (`id`),

  KEY `store_name` (`shop`)

) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";

$wpdb->query($sql);


//enable carrirer

$carrier_table_name = $wpdb->prefix.'store_enabled_carriers';

$sql = "CREATE TABLE  if not exists `$carrier_table_name` (

  `id` int(11) NOT NULL AUTO_INCREMENT ,

  `shop` varchar(100) NOT NULL,

  `carrier_id` int(11) NOT NULL,



  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),

  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',

  PRIMARY KEY (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

$wpdb->query($sql);

//location table -- this table for location tab crud 

$location_table_name = $wpdb->prefix.'locations';

$sql = "CREATE TABLE  if not exists `$location_table_name` (

  `location_id` int(11) NOT NULL AUTO_INCREMENT,

  `shop` varchar(100) NOT NULL,

  `zipcode` varchar(255) NOT NULL,

  `city` varchar(255) NOT NULL,

  `state` varchar(255) NOT NULL,

  `country` varchar(255) NOT NULL,

  `location` varchar(255) NOT NULL,

  `type` varchar(255) NOT NULL,

  `instore_pickup` tinyint(1) DEFAULT NULL,

  `local_delivery` tinyint(1) DEFAULT NULL,

  `settings` blob DEFAULT NULL,

  PRIMARY KEY (`location_id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

$wpdb->query($sql);

//adding new box table -- this table is used for store the box sizes

$bins_table = $wpdb->prefix.'bins';

$sql = "CREATE TABLE  if not exists $bins_table (

  `bin_id` int(11) NOT NULL AUTO_INCREMENT,

  `shop` varchar(255) NOT NULL,

  `box_name` varchar(255) NOT NULL,

  `bin_width` int(11) NOT NULL,

  `bin_height` int(11) NOT NULL,

  `bin_length` int(11) NOT NULL,

  `bin_max_weight` int(11) NOT NULL,

  `bin_weight` int(11) NOT NULL,

  `available` tinyint(1) DEFAULT NULL,

  PRIMARY KEY (`bin_id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

$wpdb->query($sql);


// license table for storing licenses
$license = $wpdb->prefix.'sp_license';

$sql = "CREATE TABLE  if not exists $license (

  `license` varchar(255) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `carrier_limit` int(11) NOT NULL

) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE latin1_general_cs ;";

$wpdb->query($sql);

//carrier list table -- this is only for set the default all carriers its static

$carrier_list_table = $wpdb->prefix.'carriers';

$sql = "CREATE TABLE if not exists $carrier_list_table (

  `carrier_id` int(11) NOT NULL,

  `carrier_name` varchar(255) NOT NULL,

  `carrier_type` varchar(100) NOT NULL,

  `carrier_url` varchar(255) NULL,

  `image` varchar(255) NULL,

  `date_created` datetime NOT NULL,

  `last_update` datetime NOT NULL DEFAULT current_timestamp(),

  PRIMARY KEY (`carrier_id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

$wpdb->query($sql);

//check table have data or not 

$carrier_list_query = "SELECT * FROM $carrier_list_table";

if( empty( $wpdb->get_results($carrier_list_query) ) ){

    //insert the enable carrier list

    $insert_carrier_list  = "

      INSERT INTO $carrier_list_table (`carrier_id`, `carrier_name`, `carrier_type`, `carrier_url`, `image` ,  `date_created`, `last_update`) VALUES

    (1, 'FedEx LTL','LTL', 'http://fedexrateprovider.com', 'FedEx.png', '2020-01-15 05:55:48', '2020-01-15 05:55:48'),

    -- (456, 'USPS LTL', 'http://uspsrateprovider.com', '', '2020-01-15 05:58:17', '2020-01-15 05:58:17'),

    (2, 'UPS LTL','LTL', 'http://upsrateprovider.com', 'UPS.png', '2020-01-15 05:58:43', '2020-01-15 05:58:43'),

    (3, 'WWE LTL', 'LTL', 'http://wweLTL.com', 'WWE3.png', '2020-02-24 04:41:06', '2020-02-24 04:41:06'),

    -- (4, 'XPO LTL', 'http://XPOrateprovider.com', '', '2020-02-25 01:39:43', '2020-02-25 01:39:43'),

    (4, 'ABF LTL', 'LTL', 'http://ABFrateprovider.com', 'ABF.png', '2020-02-25 01:58:46', '2020-02-25 01:58:46'),

    (6, 'FedEx small', 'small', 'http://fedexrateprovider.com', 'FedEx.png', '2020-02-25 03:09:50', '2020-02-25 03:09:50'),

    (8, 'UPS small', 'small', 'http://upsrateprovider.com', 'UPS.png', '2020-02-25 03:10:10', '2020-02-25 03:10:10'),

    (7, 'WWE small', 'small', 'http://wwe.com', 'WWE3.png', '2020-02-25 03:10:29', '2020-02-25 03:10:29'),

    (5, 'RL', 'LTL', 'http://RAndL.com', 'RAndL.png', '2020-02-25 03:15:09', '2020-02-25 03:15:09');

    ";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    dbDelta( $insert_carrier_list );

    $wpdb->query( $insert_carrier_list );
  }



    //WWE carrier list table -- to show carriers in wwe ltl

$wwe_carrier_list_table = $wpdb->prefix.'carrier_list';

$sql = "CREATE TABLE if not exists $wwe_carrier_list_table (

  `id` int(11) NOT NULL AUTO_INCREMENT,

  `carrier_code` varchar(50) NOT NULL,

  `carrier_name` varchar(100) NOT NULL,

  `carrier_logo` varchar(255) NOT NULL,

  `carrier_id` int(11) NOT NULL,

  PRIMARY KEY (`id`)

) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

$wpdb->query($sql);

//check table have data or not 

$carrier_list_query = "SELECT * FROM $wwe_carrier_list_table";

if( empty( $wpdb->get_results($carrier_list_query) ) ){

    //insert the enable carrier list

    $insert_carrier_list  = "

      INSERT INTO $wwe_carrier_list_table (`carrier_code`, `carrier_name`, `carrier_logo`, `carrier_id`) VALUES

    ('AACT','AAA Cooper Transportation', 'aact.png', '3'),

    ('ABFS','ABF Freight System, Inc', 'abfs.png', '3'),

    ('AMAP','AMA Transportation Company Inc ', 'amap.png', '3'),

    ('APXT','APEX XPRESS  ', 'apxt.png', '3'),


    ('ATMR','Atlas Motor Express  ', 'atmr.png', '3'),

    ('BCKT','Becker Trucking Inc  ', 'bckt.png', '3'),

    ('BEAV','Beaver Express Service, LLC  ', 'beav.png', '3'),

    ('BTVP','Best Overnite Express  ', 'btvp.png', '3'),

    ('CAZF','Central Arizona Freight Lines  ', 'cazf.png', '3'),

    ('CENF','Central Freight Lines, Inc ', 'cenf.png', '3'),

    ('CLNI','Clear Lane Freight Systems ', 'clni.png', '3'),

    ('CNWY','XPO Logistics  ', 'xpo-logistics.png', '3'),

    ('CPCD','Cape Cod Express ', 'cpcd.png', '3'),

    ('CTII','Central Transport  ', 'ctii.png', '3'),

    ('CXRE','Cal State Express', 'cxre.png', '3'),

    ('DAFG','Dayton Freight ', 'dafg.png', '3'),

    ('DDPP','Dedicated Delivery Professionals ', 'ddpp.png', '3'),

    ('DHRN','Dohrn Transfer Company ', 'dhrn.png', '3'),

    ('DPHE','Dependable Highway Express ', 'dphe.png', '3'),

    ('DTST','DATS Trucking Inc  ', 'dtst.png', '3'),

    ('DUBL','Dugan Truck Lines  ', 'dubl.png', '3'),

    ('DYLT','Daylight Transport', 'dylt.png', '3'),
    
    ('EXLA','Estes Express Lines  ', 'exla.png', '3'),
    
    ('FCSY','Frontline Freight Inc  ', 'fcsy.png', '3'),
    
    ('FLAN  ','Flo Trans  ', 'flan.png', '3'),
    
    ('FTSC','Fort Transportation  ', 'ftsc.png', '3'),
    
    ('FWDN','Forward Air, Inc ', 'fwdn.png', '3'),
    
    ('GLDF','Gold Coast Freightways ', 'gldf.png', '3'),
    
    ('HMES','Holland', 'hmes.png', '3'),
    
    ('LAXV','Land Air Express Of New England', 'laxv.png', '3'),
    
    ('LKVL','Lakeville Motor Express Inc  ', 'lkvl.png', '3'),
    
    ('MIDW','Midwest Motor Express  ', 'midw.png', '3'),
    
    ('NEBT','Nebraska Transport ', 'nebt.png', '3'),
    
    ('NEMF','New England Motor Freight  ', 'nemf.png', '3'),
    
    ('NOPK','North Park Transportation Co ', 'nopk.png', '3'),
    
    ('NPME','New Penn Motor Express ', 'npme.png', '3'),
    
    ('OAKH','Oak Harbor Freight Lines ', 'oakh.png', '3'),
    
    ('ODFL','Old Dominion ', 'odfl.png', '3'),
    
    ('PITD  ','Pitt Ohio Express, LLC ', 'pitd.png', '3'),
    
    ('PMLI','Pace Motor Lines, Inc', 'pmli.png', '3'),
    
    ('PNII','ProTrans International ', 'pnii.png', '3'),
    
    ('PYLE','A Duie PYLE  ', 'pyle.png', '3'),
    
    ('RDFS','Roadrunner Transportation Services ', 'rdfs.png', '3'),
    
    ('RDWY','YRC', 'rdwy.png', '3'),
    
    ('RETL','USF Reddaway ', 'retl.png', '3'),
    
    ('RJWI','RJW Transport  ', 'rjwi.png', '3'),
    
    ('RLCA','R & L Carriers Inc', 'rlca.png', '3'),
    
    ('ROSI','Roseville Motor Express', 'rosi.png', '3'),
    
    ('RXIC','Ross Express ', 'rxic.png', '3'),
    
    ('SAIA','SAIA', 'saia.png', '3');
    

    ";

    // require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    // dbDelta( $insert_carrier_list );

    $wpdb->query( $insert_carrier_list );



}

//adding countries

$countries_table = $wpdb->prefix.'countries';

$sql = "CREATE TABLE $countries_table (
  `country_code` varchar(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`country_code`),
  KEY `country_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

$wpdb->query($sql);

//check table have data or not 

$countries_query = "SELECT * FROM $countries_table";

if( empty( $wpdb->get_results($countries_query) ) ){

    //insert the enable carrier list

    $insert_countries  = "

      INSERT INTO $countries_table (`country_code`, `name`) VALUES
-- ('AF',  'Afghanistan'),
-- ('AL',  'Albania'),
-- ('DZ',  'Algeria'),
-- ('AS',  'American Samoa'),
-- ('AD',  'Andorra'),
-- ('AO',  'Angola'),
-- ('AI',  'Anguilla'),
-- ('AQ',  'Antarctica'),
-- ('AG',  'Antigua and Barbuda'),
-- ('AR',  'Argentina'),
-- ('AM',  'Armenia'),
-- ('AW',  'Aruba'),
-- ('AU',  'Australia'),
-- ('AT',  'Austria'),
-- ('AZ',  'Azerbaijan'),
-- ('BS',  'Bahamas'),
-- ('BH',  'Bahrain'),
-- ('BD',  'Bangladesh'),
-- ('BB',  'Barbados'),
-- ('BY',  'Belarus'),
-- ('BE',  'Belgium'),
-- ('BZ',  'Belize'),
-- ('BJ',  'Benin'),
-- ('BM',  'Bermuda'),
-- ('BT',  'Bhutan'),
-- ('BO',  'Bolivia'),
-- ('BA',  'Bosnia and Herzegovina'),
-- ('BW',  'Botswana'),
-- ('BV',  'Bouvet Island'),
-- ('BR',  'Brazil'),
-- ('BQ',  'British Antarctic Territory'),
-- ('IO',  'British Indian Ocean Territory'),
-- ('VG',  'British Virgin Islands'),
-- ('BN',  'Brunei'),
-- ('BG',  'Bulgaria'),
-- ('BF',  'Burkina Faso'),
-- ('BI',  'Burundi'),
-- ('KH',  'Cambodia'),
-- ('CM',  'Cameroon'),
('CA',  'Canada'),
-- ('CT',  'Canton and Enderbury Islands'),
-- ('CV',  'Cape Verde'),
-- ('KY',  'Cayman Islands'),
-- ('CF',  'Central African Republic'),
-- ('TD',  'Chad'),
-- ('CL',  'Chile'),
-- ('CN',  'China'),
-- ('CX',  'Christmas Island'),
-- ('CC',  'Cocos [Keeling] Islands'),
-- ('CO',  'Colombia'),
-- ('KM',  'Comoros'),
-- ('CG',  'Congo - Brazzaville'),
-- ('CD',  'Congo - Kinshasa'),
-- ('CK',  'Cook Islands'),
-- ('CR',  'Costa Rica'),
-- ('CI',  'Côte d’Ivoire'),
-- ('HR',  'Croatia'),
-- ('CU',  'Cuba'),
-- ('CY',  'Cyprus'),
-- ('CZ',  'Czech Republic'),
-- ('DK',  'Denmark'),
-- ('DJ',  'Djibouti'),
-- ('DM',  'Dominica'),
-- ('DO',  'Dominican Republic'),
-- ('NQ',  'Dronning Maud Land'),
-- ('DD',  'East Germany'),
-- ('EC',  'Ecuador'),
-- ('EG',  'Egypt'),
-- ('SV',  'El Salvador'),
-- ('GQ',  'Equatorial Guinea'),
-- ('ER',  'Eritrea'),
-- ('EE',  'Estonia'),
-- ('ET',  'Ethiopia'),
-- ('FK',  'Falkland Islands'),
-- ('FO',  'Faroe Islands'),
-- ('FJ',  'Fiji'),
-- ('FI',  'Finland'),
-- ('FR',  'France'),
-- ('GF',  'French Guiana'),
-- ('PF',  'French Polynesia'),
-- ('FQ',  'French Southern and Antarctic Territories'),
-- ('TF',  'French Southern Territories'),
-- ('GA',  'Gabon'),
-- ('GM',  'Gambia'),
-- ('GE',  'Georgia'),
-- ('DE',  'Germany'),
-- ('GH',  'Ghana'),
-- ('GI',  'Gibraltar'),
-- ('GR',  'Greece'),
-- ('GL',  'Greenland'),
-- ('GD',  'Grenada'),
-- ('GP',  'Guadeloupe'),
-- ('GU',  'Guam'),
-- ('GT',  'Guatemala'),
-- ('GG',  'Guernsey'),
-- ('GN',  'Guinea'),
-- ('GW',  'Guinea-Bissau'),
-- ('GY',  'Guyana'),
-- ('HT',  'Haiti'),
-- ('HM',  'Heard Island and McDonald Islands'),
-- ('HN',  'Honduras'),
-- ('HK',  'Hong Kong SAR China'),
-- ('HU',  'Hungary'),
-- ('IS',  'Iceland'),
-- ('IN',  'India'),
-- ('ID',  'Indonesia'),
-- ('IR',  'Iran'),
-- ('IQ',  'Iraq'),
-- ('IE',  'Ireland'),
-- ('IM',  'Isle of Man'),
-- ('IL',  'Israel'),
-- ('IT',  'Italy'),
-- ('JM',  'Jamaica'),
-- ('JP',  'Japan'),
-- ('JE',  'Jersey'),
-- ('JT',  'Johnston Island'),
-- ('JO',  'Jordan'),
-- ('KZ',  'Kazakhstan'),
-- ('KE',  'Kenya'),
-- ('KI',  'Kiribati'),
-- ('KW',  'Kuwait'),
-- ('KG',  'Kyrgyzstan'),
-- ('LA',  'Laos'),
-- ('LV',  'Latvia'),
-- ('LB',  'Lebanon'),
-- ('LS',  'Lesotho'),
-- ('LR',  'Liberia'),
-- ('LY',  'Libya'),
-- ('LI',  'Liechtenstein'),
-- ('LT',  'Lithuania'),
-- ('LU',  'Luxembourg'),
-- ('MO',  'Macau SAR China'),
-- ('MK',  'Macedonia'),
-- ('MG',  'Madagascar'),
-- ('MW',  'Malawi'),
-- ('MY',  'Malaysia'),
-- ('MV',  'Maldives'),
-- ('ML',  'Mali'),
-- ('MT',  'Malta'),
-- ('MH',  'Marshall Islands'),
-- ('MQ',  'Martinique'),
-- ('MR',  'Mauritania'),
-- ('MU',  'Mauritius'),
-- ('YT',  'Mayotte'),
-- ('FX',  'Metropolitan France'),
-- ('MX',  'Mexico'),
-- ('FM',  'Micronesia'),
-- ('MI',  'Midway Islands'),
-- ('MD',  'Moldova'),
-- ('MC',  'Monaco'),
-- ('MN',  'Mongolia'),
-- ('ME',  'Montenegro'),
-- ('MS',  'Montserrat'),
-- ('MA',  'Morocco'),
-- ('MZ',  'Mozambique'),
-- ('MM',  'Myanmar [Burma]'),
-- ('NA',  'Namibia'),
-- ('NR',  'Nauru'),
-- ('NP',  'Nepal'),
-- ('NL',  'Netherlands'),
-- ('AN',  'Netherlands Antilles'),
-- ('NT',  'Neutral Zone'),
-- ('NC',  'New Caledonia'),
-- ('NZ',  'New Zealand'),
-- ('NI',  'Nicaragua'),
-- ('NE',  'Niger'),
-- ('NG',  'Nigeria'),
-- ('NU',  'Niue'),
-- ('NF',  'Norfolk Island'),
-- ('KP',  'North Korea'),
-- ('VD',  'North Vietnam'),
-- ('MP',  'Northern Mariana Islands'),
-- ('NO',  'Norway'),
-- ('OM',  'Oman'),
-- ('PC',  'Pacific Islands Trust Territory'),
-- ('PK',  'Pakistan'),
-- ('PW',  'Palau'),
-- ('PS',  'Palestinian Territories'),
-- ('PA',  'Panama'),
-- ('PZ',  'Panama Canal Zone'),
-- ('PG',  'Papua New Guinea'),
-- ('PY',  'Paraguay'),
-- ('YD',  'People\'s Democratic Republic of Yemen'),
-- ('PE',  'Peru'),
-- ('PH',  'Philippines'),
-- ('PN',  'Pitcairn Islands'),
-- ('PL',  'Poland'),
-- ('PT',  'Portugal'),
-- ('PR',  'Puerto Rico'),
-- ('QA',  'Qatar'),
-- ('RE',  'Réunion'),
-- ('RO',  'Romania'),
-- ('RU',  'Russia'),
-- ('RW',  'Rwanda'),
-- ('BL',  'Saint Barthélemy'),
-- ('SH',  'Saint Helena'),
-- ('KN',  'Saint Kitts and Nevis'),
-- ('LC',  'Saint Lucia'),
-- ('MF',  'Saint Martin'),
-- ('PM',  'Saint Pierre and Miquelon'),
-- ('VC',  'Saint Vincent and the Grenadines'),
-- ('WS',  'Samoa'),
-- ('SM',  'San Marino'),
-- ('ST',  'São Tomé and Príncipe'),
-- ('SA',  'Saudi Arabia'),
-- ('SN',  'Senegal'),
-- ('RS',  'Serbia'),
-- ('CS',  'Serbia and Montenegro'),
-- ('SC',  'Seychelles'),
-- ('SL',  'Sierra Leone'),
-- ('SG',  'Singapore'),
-- ('SK',  'Slovakia'),
-- ('SI',  'Slovenia'),
-- ('SB',  'Solomon Islands'),
-- ('SO',  'Somalia'),
-- ('ZA',  'South Africa'),
-- ('GS',  'South Georgia and the South Sandwich Islands'),
-- ('KR',  'South Korea'),
-- ('ES',  'Spain'),
-- ('LK',  'Sri Lanka'),
-- ('SD',  'Sudan'),
-- ('SR',  'Suriname'),
-- ('SJ',  'Svalbard and Jan Mayen'),
-- ('SZ',  'Swaziland'),
-- ('SE',  'Sweden'),
-- ('CH',  'Switzerland'),
-- ('SY',  'Syria'),
-- ('TW',  'Taiwan'),
-- ('TJ',  'Tajikistan'),
-- ('TZ',  'Tanzania'),
-- ('TH',  'Thailand'),
-- ('TL',  'Timor-Leste'),
-- ('TG',  'Togo'),
-- ('TK',  'Tokelau'),
-- ('TO',  'Tonga'),
-- ('TT',  'Trinidad and Tobago'),
-- ('TN',  'Tunisia'),
-- ('TR',  'Turkey'),
-- ('TM',  'Turkmenistan'),
-- ('TC',  'Turks and Caicos Islands'),
-- ('TV',  'Tuvalu'),
-- ('UM',  'U.S. Minor Outlying Islands'),
-- ('PU',  'U.S. Miscellaneous Pacific Islands'),
-- ('VI',  'U.S. Virgin Islands'),
-- ('UG',  'Uganda'),
-- ('UA',  'Ukraine'),
-- ('SU',  'Union of Soviet Socialist Republics'),
-- ('AE',  'United Arab Emirates'),
-- ('GB',  'United Kingdom'),
('US',  'United States');
-- ('UY',  'Uruguay'),
-- ('UZ',  'Uzbekistan'),
-- ('VU',  'Vanuatu'),
-- ('VA',  'Vatican City'),
-- ('VE',  'Venezuela'),
-- ('VN',  'Vietnam'),
-- ('WK',  'Wake Island'),
-- ('WF',  'Wallis and Futuna'),
-- ('EH',  'Western Sahara'),
-- ('YE',  'Yemen'),
-- ('ZM',  'Zambia'),
-- ('ZW',  'Zimbabwe'),
-- ('AX',  'Åland Islands');

    ";

    // require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    // dbDelta( $insert_countries );

    $wpdb->query( $insert_countries );
  }


?>