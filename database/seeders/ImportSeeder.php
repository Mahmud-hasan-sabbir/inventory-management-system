<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReferenceType;
use App\Models\Admin\InfoPersonal;
use App\Models\Master\MastDepartment;
use App\Models\Master\MastDesignation;
use App\Models\Master\MastEmployeeType;
use App\Models\Master\MastWorkStation;
use App\Models\Master\MastLeave;
use App\Models\Master\MastPackage;
use App\Models\Master\MastUnit;
use App\Models\Master\MastItemCategory;
use App\Models\Master\MastItemGroup;
use App\Models\Master\MastItemRegister;
use App\Models\Master\MastSupplier;
use App\Models\Master\MastCustomerType;
use App\Models\Master\MastCustomer;

class ImportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //______________MASTER________________//
        MastDepartment::create([
            'dept_name'=>'AC',
            'dept_head'=>'1',
            'description'=>'A department is one section or part of a larger group.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastDepartment::create([
            'dept_name'=>'AC Spare Parts',
            'dept_head'=>'1',
            'description'=>'A department is one section or part of a larger group.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastDepartment::create([
            'dept_name'=>'Car Spare Parts',
            'dept_head'=>'1',
            'description'=>'A department is one section or part of a larger group.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        //____________________________________//
        MastDesignation::create([
            'desig_name'=>'CEO (Chief Executive Officer)',
            'description'=>'The highest-ranking officer in a company who is responsible for making major corporate decisions, managing the overall operations and resources of the company, and acting as the main point of communication between the board of directors and the companys management team.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastDesignation::create([
            'desig_name'=>'GM (General Manager)',
            'description'=>'The person in charge of managing a specific business unit or division within the company.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastDesignation::create([
            'desig_name'=>'Director',
            'description'=>'An executive-level position that oversees a particular department or function within the company.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastDesignation::create([
            'desig_name'=>'HR Manager',
            'description'=>'Developing and implementing HR policies and procedures that align with the company goals and objectives',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastDesignation::create([
            'desig_name'=>'Sales Manager',
            'description'=>'A Sales Manager is an executive-level position responsible for managing the sales department of a company. They oversee the company sales policies and procedures, including sales strategies, customer relationships, sales forecasting, and revenue generation.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastDesignation::create([
            'desig_name'=>'Store Manager',
            'description'=>'A Store Manager is a mid-level position responsible for managing the day-to-day operations of a retail store. They oversee the store policies and procedures, including customer service, inventory management, sales, and staff management.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastDesignation::create([
            'desig_name'=>'Marketing Manager',
            'description'=>'A Marketing Manager is an executive-level position responsible for managing a company marketing strategies and initiatives. They oversee the marketing department, including advertising, promotions, market research, and brand management.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastDesignation::create([
            'desig_name'=>'Supervisor',
            'description'=>'A lower-level position that is responsible for overseeing a small team or group of employees.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastDesignation::create([
            'desig_name'=>'Service Technician',
            'description'=>'A Service Technician, also known as a Field Service Technician, is a skilled worker who provides technical support and maintenance services to customers. They typically work in industries such as information technology, telecommunications, healthcare, and manufacturing.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastDesignation::create([
            'desig_name'=>'Installation Technician',
            'description'=>'
            An Installation Technician is a skilled worker who is responsible for installing and setting up various types of equipment and systems. They work in a variety of industries, including telecommunications, information technology, healthcare, and manufacturing.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastDesignation::create([
            'desig_name'=>'Customer Service',
            'description'=>'Customer service is the support and assistance provided to customers before, during, and after they purchase a product or service. It involves a range of activities designed to enhance the customer experience, increase customer satisfaction, and promote customer loyalty.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastDesignation::create([
            'desig_name'=>'Staff',
            'description'=>'An entry-level position that typically involves performing administrative or support duties.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        //____________________________________//
        MastEmployeeType::create([
            'cat_name'=>'Full-Time Employees',
            'cat_type'=>'1',
            'description'=>'These are employees who work for the company on a regular basis and are typically paid a salary or an hourly wage. They may be eligible for benefits such as health insurance, retirement plans, and paid time off.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastEmployeeType::create([
            'cat_name'=>'Part-Time Employees',
            'cat_type'=>'1',
            'description'=>'These are employees who work for the company on a part-time basis, usually less than 40 hours per week. They may be paid an hourly wage and may or may not be eligible for benefits depending on the company policies.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastEmployeeType::create([
            'cat_name'=>'Contract Employees',
            'cat_type'=>'1',
            'description'=>'These are individuals who work for the company on a temporary basis and are usually hired to perform a specific job or task. They may be paid a flat fee or an hourly rate and are typically not eligible for benefits.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastEmployeeType::create([
            'cat_name'=>'Interns',
            'cat_type'=>'1',
            'description'=>'These are students or recent graduates who work for the company on a temporary basis to gain work experience and develop skills. They may be paid a stipend or may work for free, and are typically not eligible for benefits.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastEmployeeType::create([
            'cat_name'=>'Consultants',
            'cat_type'=>'1',
            'description'=>'These are individuals or firms who are hired by the company to provide specialized expertise or services on a project basis. They may be paid a flat fee or an hourly rate and are typically not eligible for benefits.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastEmployeeType::create([
            'cat_name'=>'Seasonal Employees',
            'cat_type'=>'1',
            'description'=>'These are employees who work for the company during specific times of the year when there is a higher demand for the companys products or services. They may be paid an hourly wage and may or may not be eligible for benefits depending on the companys policies.',
            'status'=>'1',
            'user_id'=>'1'
        ]);

        //____________________________________//
        MastLeave::create([
            'leave_name'=>'Vacation Leave',
            'max_limit'=>'1',
            'leave_code'=>'LV-0001',
            'yearly_limit'=>'3',
            'description'=>'This is time off that an employee can take for rest, relaxation, or personal reasons. Vacation leave is usually earned based on the length of time the employee has worked for the company.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastLeave::create([
            'leave_name'=>'Sick Leave',
            'max_limit'=>'1',
            'leave_code'=>'LV-0002',
            'yearly_limit'=>'3',
            'description'=>'This is time off that an employee can take when they are ill or injured. Sick leave may be paid or unpaid, depending on the companys policies.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastLeave::create([
            'leave_name'=>'Personal Leave',
            'max_limit'=>'1',
            'leave_code'=>'LV-0003',
            'yearly_limit'=>'3',
            'description'=>'This is time off that an employee can take for personal reasons, such as attending to family matters or dealing with a personal emergency.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastLeave::create([
            'leave_name'=>'Parental Leave',
            'max_limit'=>'1',
            'leave_code'=>'LV-0004',
            'yearly_limit'=>'3',
            'description'=>'This is time off that an employee can take when they become a parent, either through childbirth or adoption. Parental leave may be paid or unpaid, depending on the company policies.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastLeave::create([
            'leave_name'=>'Bereavement Leave',
            'max_limit'=>'1',
            'leave_code'=>'LV-0005',
            'yearly_limit'=>'3',
            'description'=>'This is time off that an employee can take when a close family member dies. Bereavement leave is usually paid and the amount of time off may vary depending on the company policies.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastLeave::create([
            'leave_name'=>'Maternity Leave',
            'max_limit'=>'1',
            'leave_code'=>'LV-0006',
            'yearly_limit'=>'3',
            'description'=>'This is time off that a female employee can take before and after childbirth. Maternity leave may be paid or unpaid, depending on the company policies.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastLeave::create([
            'leave_name'=>'Maternity Leave',
            'max_limit'=>'1',
            'leave_code'=>'LV-0006',
            'yearly_limit'=>'3',
            'description'=>'This is time off that a female employee can take before and after childbirth. Maternity leave may be paid or unpaid, depending on the company policies.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        //____________________________________//
        MastWorkStation::create([
            'store_name'=>'Central Storehouse',
            'contact_number'=>'01995275933',
            'location'=>'Gulshan',
            'description'=>'This is time off that a female employee can take before and after childbirth. Maternity leave may be paid or unpaid, depending on the company policies.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastWorkStation::create([
            'store_name'=>'Gulf international associates ltd.',
            'contact_number'=>'01995275933',
            'location'=>'Gulshan',
            'description'=>'This is time off that a female employee can take before and after childbirth. Maternity leave may be paid or unpaid, depending on the company policies.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastWorkStation::create([
            'store_name'=>'Icon information Systems ltd.',
            'contact_number'=>'01995275933',
            'location'=>'Mirpur',
            'description'=>'This is time off that a female employee can take before and after childbirth. Maternity leave may be paid or unpaid, depending on the company policies.',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        //____________________________________//
        ReferenceType::create([
            'name'=>'Purchase',
            'status'=>'1',
        ]);
        ReferenceType::create([
            'name'=>'Sales',
            'status'=>'1',
        ]);
        ReferenceType::create([
            'name'=>'Store Transfer',
            'status'=>'1',
        ]);
        ReferenceType::create([
            'name'=>'Sales Return',
            'status'=>'1',
        ]);
        //____________________________________//
        MastPackage::create([
            'pkg_name'=>'1 X 1',
            'pkg_size'=>'1',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastPackage::create([
            'pkg_name'=>'1 X 4',
            'pkg_size'=>'4',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastPackage::create([
            'pkg_name'=>'1 X 6',
            'pkg_size'=>'6',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastPackage::create([
            'pkg_name'=>'1 X 8',
            'pkg_size'=>'8',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastPackage::create([
            'pkg_name'=>'1 X 10',
            'pkg_size'=>'10',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastPackage::create([
            'pkg_name'=>'1 X 12',
            'pkg_size'=>'12',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastPackage::create([
            'pkg_name'=>'1 X 16',
            'pkg_size'=>'16',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastPackage::create([
            'pkg_name'=>'1 X 20',
            'pkg_size'=>'20',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastPackage::create([
            'pkg_name'=>'1 X 24',
            'pkg_size'=>'24',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastPackage::create([
            'pkg_name'=>'1 X 36',
            'pkg_size'=>'36',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastPackage::create([
            'pkg_name'=>'1 X 48',
            'pkg_size'=>'48',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        //____________________________________//
        MastUnit::create([
            'unit_name'=>'Cubic Meter',
            'description'=>' This is a unit of volume commonly used to measure the capacity of a box or container. ',
            'status'=>'1',
            'mast_item_category_id'=>'1',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Carton',
            'description'=>' In some cases, "box" may be used interchangeably with "carton" to refer to a specific packaging unit.',
            'status'=>'1',
            'mast_item_category_id'=>'1',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Crate',
            'description'=>'A crate is a rigid container, typically made of wood or plastic, used for shipping or storing goods.',
            'status'=>'1',
            'mast_item_category_id'=>'2',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Packaging ',
            'description'=>'In the context of retail or wholesale, products may be packaged in specific units, such as a certain number of items per box or package. ',
            'status'=>'1',
            'mast_item_category_id'=>'2',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Window Air',
            'description'=>'These units are self-contained and designed to be installed in a window or a specially made opening in a wall. They provide cooling for individual rooms or small spaces.',
            'status'=>'1',
            'mast_item_category_id'=>'2',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Split Air',
            'description'=>'Split AC units consist of two main components: an indoor unit and an outdoor unit. The indoor unit is installed inside the room, while the outdoor unit is placed outside the building. ',
            'status'=>'1',
            'mast_item_category_id'=>'2',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Central Air',
            'description'=>'Central AC units are designed to cool entire buildings or large areas. They consist of a centralized cooling unit that distributes cool air through a network of ducts and vents. ',
            'status'=>'1',
            'mast_item_category_id'=>'2',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Portable Air',
            'description'=>' These units are freestanding and can be moved from room to room as needed. Portable AC units typically include a venting kit that allows hot air to be exhausted through a window or vent.',
            'status'=>'1',
            'mast_item_category_id'=>'2',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Ductless Mini-Split Air',
            'description'=>'Similar to split AC units, ductless mini-split systems consist of an indoor unit and an outdoor unit. However, they do not require ductwork for air distribution. They are ideal for cooling individual rooms or specific zones within a building.',
            'status'=>'1',
            'mast_item_category_id'=>'2',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Spark plugs',
            'description'=>'Sold as individual units.',
            'status'=>'1',
            'mast_item_category_id'=>'3',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Brake pads',
            'description'=>'Sold as a set for each wheel (usually 2 or 4 pads per set).',
            'status'=>'1',
            'mast_item_category_id'=>'3',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Air filters',
            'description'=>'Sold as individual units.',
            'status'=>'1',
            'mast_item_category_id'=>'3',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Oil filters',
            'description'=>'Sold as individual units.',
            'status'=>'1',
            'mast_item_category_id'=>'3',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Headlights',
            'description'=>'Sold as individual units (left and right headlights)',
            'status'=>'1',
            'mast_item_category_id'=>'3',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Taillights',
            'description'=>'Sold as individual units (left and right taillights).',
            'status'=>'1',
            'mast_item_category_id'=>'3',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Brake discs/rotors',
            'description'=>'Sold as individual units (typically per wheel).',
            'status'=>'1',
            'mast_item_category_id'=>'3',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Timing belts',
            'description'=>'Sold as individual units.',
            'status'=>'1',
            'mast_item_category_id'=>'3',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Fuel filters',
            'description'=>'Sold as individual units.',
            'status'=>'1',
            'mast_item_category_id'=>'3',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Water pumps',
            'description'=>'Sold as individual units.',
            'status'=>'1',
            'mast_item_category_id'=>'3',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Radiators',
            'description'=>'Sold as individual units.',
            'status'=>'1',
            'mast_item_category_id'=>'3',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Shock absorbers',
            'description'=>'Sold as individual units (per wheel).',
            'status'=>'1',
            'mast_item_category_id'=>'3',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Control arms',
            'description'=>'Sold as individual units (per wheel).',
            'status'=>'1',
            'mast_item_category_id'=>'3',
            'user_id'=>'1'
        ]);
        MastUnit::create([
            'unit_name'=>'Ball joints',
            'description'=>'Sold as individual units (per wheel).',
            'status'=>'1',
            'mast_item_category_id'=>'3',
            'user_id'=>'1'
        ]);
        //____________________________________//
        MastItemCategory::create([
            'cat_name'=>'AC',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastItemCategory::create([
            'cat_name'=>'AC Spare Parts',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastItemCategory::create([
            'cat_name'=>'Car Spare Parts',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastItemCategory::create([
            'cat_name'=>'Tools Requisition',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        MastItemCategory::create([
            'cat_name'=>'Spare Part Requisition',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1'
        ]);
        //____________________________________//
        MastItemGroup::create([
            'part_name'=>'Window Air Conditioners',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1',
            'mast_item_category_id'=>'1'
        ]);
        MastItemGroup::create([
            'part_name'=>'Split Air Conditioners',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1',
            'mast_item_category_id'=>'1'
        ]);
        MastItemGroup::create([
            'part_name'=>'Central Air Conditioning',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1',
            'mast_item_category_id'=>'1'
        ]);
        MastItemGroup::create([
            'part_name'=>'ARM BUSHING',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1',
            'mast_item_category_id'=>'3'
        ]);
        MastItemGroup::create([
            'part_name'=>'SUSPENSION BUSH',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1',
            'mast_item_category_id'=>'3'
        ]);
        MastItemGroup::create([
            'part_name'=>'REAR SUSPENSION BUSH',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1',
            'mast_item_category_id'=>'3'
        ]);
        MastItemGroup::create([
            'part_name'=>'SPRIN SHACKLE BUSH',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1',
            'mast_item_category_id'=>'3'
        ]);
        MastItemGroup::create([
            'part_name'=>'SHOCK ABSORBER BUSH',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1',
            'mast_item_category_id'=>'3'
        ]);
        MastItemGroup::create([
            'part_name'=>'SUPRING SHACKLE RUBBER',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1',
            'mast_item_category_id'=>'3'
        ]);
        MastItemGroup::create([
            'part_name'=>'UP ARM BUSHING',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1',
            'mast_item_category_id'=>'3'
        ]);
        MastItemGroup::create([
            'part_name'=>'FONT LOWER ARM BUSH',
            'description'=>'',
            'status'=>'1',
            'user_id'=>'1',
            'mast_item_category_id'=>'3'
        ]);
        //____________________________________//
        MastItemRegister::create([
            'box_code'=>'5',
            'gulf_code'=>'2',
            'part_no'=>'1178598',
            'description'=>'Test Only1',
            'box_qty'=>'12',
            'price'=>'7500',
            'image'=>'',
            'warranty'=>'12',
            'cat_id'=>'1',
            'bar_code'=>'97049180517',
            'user_id'=>'1',
            'mast_item_group_id'=>'1',
            'unit_id'=>'6',
        ]);
        MastItemRegister::create([
            'box_code'=>'5',
            'gulf_code'=>'2',
            'part_no'=>'1278598',
            'description'=>'Test Only2',
            'box_qty'=>'12',
            'price'=>'9500',
            'image'=>'',
            'warranty'=>'12',
            'cat_id'=>'1',
            'bar_code'=>'97049180517',
            'user_id'=>'1',
            'mast_item_group_id'=>'1',
            'unit_id'=>'6',
        ]);
        MastItemRegister::create([
            'box_code'=>'9',
            'gulf_code'=>'7',
            'part_no'=>'1078598',
            'description'=>'Test Only3',
            'box_qty'=>'16',
            'price'=>'10000',
            'image'=>'',
            'warranty'=>'12',
            'cat_id'=>'2',
            'bar_code'=>'98049180517',
            'user_id'=>'1',
            'mast_item_group_id'=>'2',
            'unit_id'=>'8',
        ]);
        //____________________________________//
        MastSupplier::create([
            'supplier_name'=>'Alam',
            'contact_person'=>'Sagour Khan',
            'email'=>'alam@gmail.com',
            'phone_number'=>'01995275933',
            'address'=>'Shariatpur',
            'user_id'=>'1',
        ]);
        MastSupplier::create([
            'supplier_name'=>'Sabbir',
            'contact_person'=>'Sagour Khan',
            'email'=>'sabbir@gmail.com',
            'phone_number'=>'01995275933',
            'address'=>'Shariatpur',
            'user_id'=>'1',
        ]);
        MastSupplier::create([
            'supplier_name'=>'Minhaz',
            'contact_person'=>'Sagour Khan',
            'email'=>'minhaz@gmail.com',
            'phone_number'=>'01995275933',
            'address'=>'Shariatpur',
            'user_id'=>'1',
        ]);
        //____________________________________//
        MastCustomerType::create([
            'name'=>'Corporate',
            'status'=>'1',
        ]);
        MastCustomerType::create([
            'name'=>'Distributer',
            'status'=>'1',
        ]);
        MastCustomerType::create([
            'name'=>'Retailer',
            'status'=>'1',
        ]);
        //____________________________________//
        MastCustomer::create([
            'name'=>'Motiur Rahman',
            'email'=>'tayfa@gmail.com',
            'phone'=>'01913954378',
            'address'=>'Shariatpur',
            'cont_person'=>'Sagour Khan',
            'cont_designation'=>'Teacher',
            'cont_phone'=>'01922437143',
            'cont_email'=>'sagour@gmail.com',
            'web_address'=>'',
            'credit_limit'=>'1000000',
            'remarks'=>'Test Only',
            'status'=>'1',
            'mast_customer_type_id'=>'1',
            'user_id'=>'1',
        ]);
        MastCustomer::create([
            'name'=>'Sabbir',
            'email'=>'tayfa@gmail.com',
            'phone'=>'01913954378',
            'address'=>'Shariatpur',
            'cont_person'=>'Alam Khan',
            'cont_designation'=>'Teacher',
            'cont_phone'=>'01922437143',
            'cont_email'=>'sagour@gmail.com',
            'web_address'=>'',
            'credit_limit'=>'1000000',
            'remarks'=>'Test Only',
            'status'=>'1',
            'mast_customer_type_id'=>'1',
            'user_id'=>'1',
        ]);
        MastCustomer::create([
            'name'=>'Minhaz',
            'email'=>'tayfa@gmail.com',
            'phone'=>'01913954378',
            'address'=>'Shariatpur',
            'cont_person'=>'Sagour Khan',
            'cont_designation'=>'Teacher',
            'cont_phone'=>'01922437143',
            'cont_email'=>'tamim@gmail.com',
            'web_address'=>'',
            'credit_limit'=>'1000000',
            'remarks'=>'Test Only',
            'status'=>'1',
            'mast_customer_type_id'=>'1',
            'user_id'=>'1',
        ]);
        MastCustomer::create([
            'name'=>'Tamim',
            'email'=>'tayfa@gmail.com',
            'phone'=>'01913954378',
            'address'=>'Shariatpur',
            'cont_person'=>'Motiur Khan',
            'cont_designation'=>'Teacher',
            'cont_phone'=>'01922437143',
            'cont_email'=>'sagour@gmail.com',
            'web_address'=>'',
            'credit_limit'=>'1000000',
            'remarks'=>'Test Only',
            'status'=>'1',
            'mast_customer_type_id'=>'2',
            'user_id'=>'1',
        ]);
        MastCustomer::create([
            'name'=>'Tayfa Islam',
            'email'=>'tayfa@gmail.com',
            'phone'=>'01913954378',
            'address'=>'Shariatpur',
            'cont_person'=>'Sagour Khan',
            'cont_designation'=>'Teacher',
            'cont_phone'=>'01922437143',
            'cont_email'=>'koli@gmail.com',
            'web_address'=>'',
            'credit_limit'=>'1000000',
            'remarks'=>'Test Only',
            'status'=>'1',
            'mast_customer_type_id'=>'3',
            'user_id'=>'1',
        ]);

        //____________________________________//

        //__________EMPLOYEE INFO_____________//
        InfoPersonal::create([
            'date_of_birth'=>'2002-01-01',
            'employee_gender'=>'0',
            'nid_no'=>'25745545458',
            'blood_group'=>'3',
            'mast_department_id'=>'1',
            'mast_designation_id'=>'5',
            'mast_employee_type_id'=>'2',
            'mast_work_station_id'=>'2',
            'number_official'=>'0195275932',
            'email_official'=>'motiur@gulf.com',
            'joining_date'=>'2022-11-01',
            'service_length'=>'2',
            'gross_salary'=>'15000',
            'reporting_boss'=>'0',
            'is_reporting_boss'=>'1',
            
            'division_present'=>'6',
            'district_present'=>'42',
            'upazila_present'=>'322',
            'union_present'=>'2887',
            'address_present'=>'Khilgoan, Domshar, Shariatpur',
    
            'division_permanent'=>'6',
            'district_permanent'=>'42',
            'upazila_permanent'=>'322',
            'union_permanent'=>'2887',
            'address_permanent'=>'Khilgoan, Domshar, Shariatpur',
    
            'passport_no'=>'1185344689',
            'driving_license'=>'0415441482',
            'marital_status'=>'0',
            'house_phone'=>'01922437143',
            'father_name'=>'Mosharraf Khan',
            'mother_name'=>'Shilpy Begum',
            'birth_certificate_no'=>'20222145678938',
            'emg_person_name'=>'Sagour',
            'emg_phone_number'=>'01995275933',
            'emg_relationship'=>'Brother',
            'emg_address'=>'Shariatpur',
            'status'=>'1',
            'user_id'=>'1',
            'emp_id'=> '1'
        ]);

    }
}
