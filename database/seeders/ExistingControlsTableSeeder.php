<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ExistingControlsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('existing_controls')->delete();
        
        \DB::table('existing_controls')->insert(array (
            0 => 
            array (
                'id' => 3,
                'control_id' => 'EC001',
                'name' => 'Policies for information security',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            1 => 
            array (
                'id' => 4,
                'control_id' => 'EC002',
                'name' => 'Information security roles and responsibilities',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            2 => 
            array (
                'id' => 5,
                'control_id' => 'EC003',
                'name' => 'Segregation of duties',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            3 => 
            array (
                'id' => 6,
                'control_id' => 'EC004',
                'name' => 'Management responsibilities',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            4 => 
            array (
                'id' => 7,
                'control_id' => 'EC005',
                'name' => 'Contact with authorities',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            5 => 
            array (
                'id' => 8,
                'control_id' => 'EC006',
                'name' => 'Contact with special inerest groups',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            6 => 
            array (
                'id' => 9,
                'control_id' => 'EC007',
                'name' => 'Threat intelligence ',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            7 => 
            array (
                'id' => 10,
                'control_id' => 'EC008',
                'name' => 'Information security in project management',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            8 => 
            array (
                'id' => 11,
                'control_id' => 'EC009',
                'name' => 'Inventory of Information and other associated assets',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            9 => 
            array (
                'id' => 12,
                'control_id' => 'EC010',
                'name' => 'Acceptable use of information and other associated assets',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            10 => 
            array (
                'id' => 13,
                'control_id' => 'EC011',
                'name' => 'Return of assets',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            11 => 
            array (
                'id' => 14,
                'control_id' => 'EC012',
                'name' => 'Classification of information',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            12 => 
            array (
                'id' => 15,
                'control_id' => 'EC013',
                'name' => 'Labelling of Information',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            13 => 
            array (
                'id' => 16,
                'control_id' => 'EC014',
                'name' => 'Information Transfer',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            14 => 
            array (
                'id' => 17,
                'control_id' => 'EC015',
                'name' => 'Access control',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            15 => 
            array (
                'id' => 18,
                'control_id' => 'EC016',
                'name' => 'Identity Management',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            16 => 
            array (
                'id' => 19,
                'control_id' => 'EC017',
                'name' => 'Authentication Information',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            17 => 
            array (
                'id' => 20,
                'control_id' => 'EC018',
                'name' => 'Access rights',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            18 => 
            array (
                'id' => 21,
                'control_id' => 'EC019',
                'name' => 'Information Security in supplier relationships',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            19 => 
            array (
                'id' => 22,
                'control_id' => 'EC020',
                'name' => 'addressing Information security wthin supplier agreements',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            20 => 
            array (
                'id' => 23,
                'control_id' => 'EC021',
            'name' => 'Managing information security in the information and communication  technology (ICT) supply chain',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            21 => 
            array (
                'id' => 24,
                'control_id' => 'EC022',
                'name' => 'Information security for use of cloud services ',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            22 => 
            array (
                'id' => 25,
                'control_id' => 'EC023',
                'name' => 'Information security incident management planning and preparation ',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            23 => 
            array (
                'id' => 26,
                'control_id' => 'EC024',
                'name' => 'Assessment and decision on information security events',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            24 => 
            array (
                'id' => 27,
                'control_id' => 'EC025',
                'name' => 'Response to information security incidents',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            25 => 
            array (
                'id' => 28,
                'control_id' => 'EC026',
                'name' => 'Learning from information security incidents',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            26 => 
            array (
                'id' => 29,
                'control_id' => 'EC027',
                'name' => 'Collection of evidence',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            27 => 
            array (
                'id' => 30,
                'control_id' => 'EC028',
                'name' => 'Information security during disruption ',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            28 => 
            array (
                'id' => 31,
                'control_id' => 'EC029',
                'name' => 'ICT readiness for Business Continuity',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            29 => 
            array (
                'id' => 32,
                'control_id' => 'EC030',
                'name' => 'Legal, statutory, regulatory and contractual requirements.',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            30 => 
            array (
                'id' => 33,
                'control_id' => 'EC031',
            'name' => 'Intellectual Property Rights (IPR)',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            31 => 
            array (
                'id' => 34,
                'control_id' => 'EC032',
                'name' => 'Protection of Records',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            32 => 
            array (
                'id' => 35,
                'control_id' => 'EC033',
            'name' => 'Privacy and protection of personally identifiable information (PII)',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            33 => 
            array (
                'id' => 36,
                'control_id' => 'EC034',
                'name' => 'Independent Review of Information Security',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            34 => 
            array (
                'id' => 37,
                'control_id' => 'EC035',
                'name' => 'Compliance with security policy and standards for information security',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            35 => 
            array (
                'id' => 38,
                'control_id' => 'EC036',
                'name' => 'Documented Operating Procedures',
                'description' => 'na',
                'control_group_id' => 1,
            ),
            36 => 
            array (
                'id' => 39,
                'control_id' => 'EC037',
                'name' => 'Screening',
                'description' => 'na',
                'control_group_id' => 2,
            ),
            37 => 
            array (
                'id' => 40,
                'control_id' => 'EC038',
                'name' => 'Terms and conditions of employment',
                'description' => 'na',
                'control_group_id' => 2,
            ),
            38 => 
            array (
                'id' => 41,
                'control_id' => 'EC039',
                'name' => 'Informations security awareness, education and training',
                'description' => 'na',
                'control_group_id' => 2,
            ),
            39 => 
            array (
                'id' => 42,
                'control_id' => 'EC040',
                'name' => 'Disciplinary process',
                'description' => 'na',
                'control_group_id' => 2,
            ),
            40 => 
            array (
                'id' => 43,
                'control_id' => 'EC041',
                'name' => 'Responsibilities after termination or change of employment',
                'description' => 'na',
                'control_group_id' => 2,
            ),
            41 => 
            array (
                'id' => 44,
                'control_id' => 'EC042',
                'name' => 'Confidentiality or non-disclosure agreements

',
                'description' => 'na',
                'control_group_id' => 2,
            ),
            42 => 
            array (
                'id' => 45,
                'control_id' => 'EC043',
                'name' => 'Remote working',
                'description' => 'na',
                'control_group_id' => 2,
            ),
            43 => 
            array (
                'id' => 46,
                'control_id' => 'EC044',
                'name' => 'Information security event reporting',
                'description' => 'na',
                'control_group_id' => 2,
            ),
            44 => 
            array (
                'id' => 47,
                'control_id' => 'EC045',
                'name' => 'Physical security perimeters',
                'description' => 'na',
                'control_group_id' => 3,
            ),
            45 => 
            array (
                'id' => 48,
                'control_id' => 'EC046',
                'name' => 'Physical entry',
                'description' => 'na',
                'control_group_id' => 3,
            ),
            46 => 
            array (
                'id' => 49,
                'control_id' => 'EC047',
                'name' => 'Securing offices, rooms and facilities',
                'description' => 'na',
                'control_group_id' => 3,
            ),
            47 => 
            array (
                'id' => 50,
                'control_id' => 'EC048',
                'name' => 'Physical security monitoring',
                'description' => 'na',
                'control_group_id' => 3,
            ),
            48 => 
            array (
                'id' => 51,
                'control_id' => 'EC049',
                'name' => 'Protecting against physical and environmental threats',
                'description' => 'na',
                'control_group_id' => 3,
            ),
            49 => 
            array (
                'id' => 52,
                'control_id' => 'EC050',
                'name' => 'Working in secure areas',
                'description' => 'na',
                'control_group_id' => 3,
            ),
            50 => 
            array (
                'id' => 53,
                'control_id' => 'EC051',
                'name' => 'Clear desk and clear screen',
                'description' => 'na',
                'control_group_id' => 3,
            ),
            51 => 
            array (
                'id' => 54,
                'control_id' => 'EC052',
                'name' => 'Equipment siting and protection',
                'description' => 'na',
                'control_group_id' => 3,
            ),
            52 => 
            array (
                'id' => 55,
                'control_id' => 'EC053',
                'name' => 'Security of assets off-premises',
                'description' => 'na',
                'control_group_id' => 3,
            ),
            53 => 
            array (
                'id' => 56,
                'control_id' => 'EC054',
                'name' => 'Storage media',
                'description' => 'na',
                'control_group_id' => 3,
            ),
            54 => 
            array (
                'id' => 57,
                'control_id' => 'EC055',
                'name' => 'Supporting utilities',
                'description' => 'na',
                'control_group_id' => 3,
            ),
            55 => 
            array (
                'id' => 58,
                'control_id' => 'EC056',
                'name' => 'Cabling security',
                'description' => 'na',
                'control_group_id' => 3,
            ),
            56 => 
            array (
                'id' => 59,
                'control_id' => 'EC057',
                'name' => 'Equipment maintenance',
                'description' => 'na',
                'control_group_id' => 3,
            ),
            57 => 
            array (
                'id' => 60,
                'control_id' => 'EC058',
                'name' => 'Secure disposal or re-use of equipment',
                'description' => 'na',
                'control_group_id' => 3,
            ),
            58 => 
            array (
                'id' => 61,
                'control_id' => 'EC059',
                'name' => 'User end point devices',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            59 => 
            array (
                'id' => 62,
                'control_id' => 'EC060',
                'name' => 'Privileged access rights',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            60 => 
            array (
                'id' => 63,
                'control_id' => 'EC061',
                'name' => 'Information access restriction',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            61 => 
            array (
                'id' => 64,
                'control_id' => 'EC062',
                'name' => 'Access to source code',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            62 => 
            array (
                'id' => 65,
                'control_id' => 'EC063',
                'name' => 'Secure authentication',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            63 => 
            array (
                'id' => 66,
                'control_id' => 'EC064',
                'name' => 'Capacity management',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            64 => 
            array (
                'id' => 67,
                'control_id' => 'EC065',
                'name' => 'Protection against malware',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            65 => 
            array (
                'id' => 68,
                'control_id' => 'EC066',
                'name' => 'Management of technical vulnerabilities',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            66 => 
            array (
                'id' => 69,
                'control_id' => 'EC067',
                'name' => 'Configuration management',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            67 => 
            array (
                'id' => 70,
                'control_id' => 'EC068',
                'name' => 'Information deletion',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            68 => 
            array (
                'id' => 71,
                'control_id' => 'EC069',
                'name' => 'Data masking',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            69 => 
            array (
                'id' => 72,
                'control_id' => 'EC070',
                'name' => 'Data leakage prevention',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            70 => 
            array (
                'id' => 73,
                'control_id' => 'EC071',
                'name' => 'Information backup',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            71 => 
            array (
                'id' => 74,
                'control_id' => 'EC072',
                'name' => 'Redundancy of information processing facilities',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            72 => 
            array (
                'id' => 75,
                'control_id' => 'EC073',
                'name' => 'Logging',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            73 => 
            array (
                'id' => 76,
                'control_id' => 'EC074',
                'name' => 'Monitoring activities',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            74 => 
            array (
                'id' => 77,
                'control_id' => 'EC075',
                'name' => 'Clock synchronization',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            75 => 
            array (
                'id' => 78,
                'control_id' => 'EC076',
                'name' => 'Use of privileged utility programs',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            76 => 
            array (
                'id' => 79,
                'control_id' => 'EC077',
                'name' => 'Installation of software on operational systems',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            77 => 
            array (
                'id' => 80,
                'control_id' => 'EC078',
                'name' => 'Networks security',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            78 => 
            array (
                'id' => 81,
                'control_id' => 'EC079',
                'name' => 'Security of network services',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            79 => 
            array (
                'id' => 82,
                'control_id' => 'EC080',
                'name' => 'Segregation of networks',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            80 => 
            array (
                'id' => 83,
                'control_id' => 'EC081',
                'name' => 'Web filtering',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            81 => 
            array (
                'id' => 84,
                'control_id' => 'EC082',
                'name' => 'Use of cryptography',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            82 => 
            array (
                'id' => 85,
                'control_id' => 'EC083',
                'name' => 'Secure development life cycle',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            83 => 
            array (
                'id' => 86,
                'control_id' => 'EC084',
                'name' => 'Application security requirements',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            84 => 
            array (
                'id' => 87,
                'control_id' => 'EC085',
                'name' => 'Secure system architecture and engineering principles',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            85 => 
            array (
                'id' => 88,
                'control_id' => 'EC086',
                'name' => 'Secure coding',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            86 => 
            array (
                'id' => 89,
                'control_id' => 'EC087',
                'name' => 'Security testing in development and acceptance',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            87 => 
            array (
                'id' => 90,
                'control_id' => 'EC088',
                'name' => 'Outsourced development',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            88 => 
            array (
                'id' => 91,
                'control_id' => 'EC089',
                'name' => 'Separation of development, test and production environments',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            89 => 
            array (
                'id' => 92,
                'control_id' => 'EC090',
                'name' => 'Change management',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            90 => 
            array (
                'id' => 93,
                'control_id' => 'EC091',
                'name' => 'Test information',
                'description' => 'na',
                'control_group_id' => 4,
            ),
            91 => 
            array (
                'id' => 94,
                'control_id' => 'EC092',
                'name' => 'Protection of information systems during audit testing',
                'description' => 'na',
                'control_group_id' => 4,
            ),
        ));
        
        
    }
}