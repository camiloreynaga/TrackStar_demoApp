<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class ProjectTest extends CDbTestCase
{
   
    public $fixtures=array
            (
                'projects'=>'Project',
                'users'=>'User',
                'projUsrAssign'=>':tbl_project_user_assignment',
            );
    
    public function testCreate()
    {
        //CREATE a new project
        $newProject= new Project;
        $newProjectName='Test Project Creation';
        $newProject->setAttributes(array(
            'name'=>$newProjectName,
            'description'=>'This is a test for new project creation',
            'createTime'=>'2009-09-09 00:00:00',
            'create_user'=>'1',
            'update_time'=>'2009-09-09 00:00:00',
            'update_user'=>'1',
        )
    );
        $this->assertTrue($newProject->save(false));
        //READ back the newly created project to ensure the creation worked
        $retrievedProject = Project::model()->findByPk($newProject->id);
        $this->assertTrue($retrievedProject instanceof Project);
        $this->assertEquals($newProjectName,$retrievedProject->name);       
    }
    
    public function testRead()
    {
        $retrievedProject= $this->projects('project1');
        $this->assertTrue($retrievedProject instanceof Project);
        $this->assertEquals('Test Project 1',$retrievedProject->name);
        
    }
    

    
    public function testUpdate()
    {
        $project=$this->projects('project2');
        $updateProjectName = 'Update Test Project 2';
        $project->name=$updateProjectName;
        $this->assertTrue($project->save(false));
        //read back to record again to ensure the update worked
        $updateProject=  Project::model()->findByPk($project->id);
        $this->assertTrue($updateProject instanceof Project);
        $this->assertEquals($updateProjectName,$updateProject->name);
                
    }
    public function testDelete()
    {
        $project=$this->projects('project2');
        $savedProjectId=$project->id;
        $this->assertTrue($project->delete());
        $deleteProject=  Project::model()->findByPk($savedProjectId);
        $this->assertEquals(NULL,$deleteProject);
    }
    
    
    public function testGetUserOptions()
    {
    $project = $this->projects('project1');
    $options = $project->userOptions;
    $this->assertTrue(is_array($options));
    $this->assertTrue(count($options) > 0);
    }
    
//    public function testGetUserOptions( )
//    {
//        $project = $this->projects('project1');
//        $options = $project->userOptions;
//        $this->assertTrue(is_array($options));
//        $this->assertTrue(count($options) >0);
//    }

    
    
//    public function testCRUD()
//    {
//        //Create a new project
//        $newProject =  new Project;
//        $newProjectName= 'Test Project 1';
//        $newProject->setAttributes(
//                Array(
//                        'name'=> $newProjectName,
//                        'description'=>'Test Project number One',
//                        'create_time'=>'2014-01-01 00:00:-00',
//                        'create_user_id'=> 1,
//                        'update_time'=>'2014-01-01 00:00:-00',
//                        'update_user_id'=>1,
//                    )
//                );
//        $this->assertTrue($newProject->save(false));
//                
//        //Read back the newly created project
//        $retrievedProject= Project::model()->findByPk($newProject->id);
//        $this->assertTrue($retrievedProject instanceof Project );
//        $this->assertEquals($newProjectName, $retrievedProject->name);
//        
//        //UPDATE the newly created project
//        $updateProjectName='Updated Test Project 1';
//        $newProject->name = $updateProjectName; 
//        $this->assertTrue($newProject->save(false));
//        
//        //read back the record again to ensure to update worked
//                
//        $updateProject=  Project::model()->findByPk($newProject->id);
//        $this->assertTrue($updateProject instanceof Project);
//        $this->assertEquals($updateProjectName, $updateProject->name );
//        
//        //DELETE the  Project
//        
//        $newProjectId= $newProject->id;
//        $this->assertTrue($newProject->delete());
//        $deleteProject=  Project::model()->findByPk($newProjectId);
//        $this->assertEquals(NULL,$deleteProject);
//        
//                
//    }
    
   
    
    
}

?>
