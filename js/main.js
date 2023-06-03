let taskName = document.getElementById("taskName");
let addBtn = document.getElementById("addBtn");
let currentIndex;
let tasks =[];
let ckeck = document.getElementById("ckeck");
let finishedTask = document.getElementById("finishedTask");
let finishedTasks = [];

let search = document.getElementById('search');
let taskAlert = document.getElementById('taskAlert');

taskName.addEventListener('keyup', function()
{
    var rejex=/^[A-Z][a-z]{3,5}[0-9]{0,2}([ ][A-Z][a-z]{3,5})*$/;
    if(!rejex.test(taskName.value))
    {
        if(taskName.value=="")
        {
            taskAlert.classList.add("d-none");
            taskAlert.classList.remove("d-flex");
            taskName.classList.remove("is-invalid");
            taskName.classList.remove("is-valid");
            addBtn.disabled="true"
        }
        else
        {
            taskName.classList.add("is-invalid");
            taskName.classList.remove("is-valid");
            taskAlert.classList.add("d-flex");
            taskAlert.classList.remove("d-none");
        }
    }
    else
    {
        taskName.classList.add("is-valid");
        taskName.classList.remove("is-invalid");
        taskAlert.classList.add("d-none");
        taskAlert.classList.remove("d-flex");
        addBtn.removeAttribute("disabled");
    }
    
})

addBtn.addEventListener("click", function()
{
    if(addBtn.innerHTML == "Add Your Task")
    {
        addTask();
        displayTask();
        resetnput();
    }
    else
    {
        upDateTask();
        displayTask();
        resetnput()
    }
})

if(!JSON.parse((localStorage.getItem("tasks") == [])) || !JSON.parse((localStorage.getItem("finshedTask") == [])))
{
    tasks = JSON.parse((localStorage.getItem("tasks")));
    displayTask();
    finishedTasks = JSON.parse((localStorage.getItem("finshedTask")));
    displayFinishedTask();
}


let name;
function addTask()
{
    let task = 
    {
        name : taskName.value
    };
    tasks.push(task);
    localStorage.setItem("tasks",JSON.stringify(tasks));
}
function displayTask()
{
    let container="";
    for(var i=0; i<tasks.length; i++)
    {
        container+=
        `
            <tr>
                <td class="mt-2">${i+1}</td>
                <td class="mt-2">${tasks[i].name}</td>
                <td ><input  onclick="testCheck(${i})" type="checkbox" class="mt-2"></td>
                <td>
                    <button class="btn btn-outline-warning" onclick="getTask(${i})">Update</button>
                </td>
                <td>
                    <button class="btn btn-outline-danger" onclick="deleteTask(${i})">Delete</button>
                </td>
            </tr>
        `
    }
    document.getElementById("tBody").innerHTML = container
}
function getTask(index)
{
    taskName.value = tasks[index].name
    addBtn.innerHTML = "Update";
    currentIndex = index;

}
function upDateTask()
{
    //console.log(tasks[currentIndex].name);
    tasks[currentIndex].name = taskName.value;
    localStorage.setItem("tasks",JSON.stringify(tasks));
    addBtn.innerHTML = "Add Your Task";
}

function deleteTask(ele)
{
    tasks.splice(ele,1);
    displayTask();
    localStorage.setItem("tasks",JSON.stringify(tasks));
}

function resetnput()
{
    taskName.value = "";
}

function testCheck(ele)
{
    let currentTask = tasks[ele];
    deleteTask()
    let finishedTask = 
    {
        name : currentTask.name
    };
    finishedTasks.push(finishedTask);
    localStorage.setItem("finshedTask",JSON.stringify(finishedTasks));
    displayFinishedTask() 
}
function displayFinishedTask()
{

    let container="";
    for(var i=0; i<finishedTasks.length; i++)
    {
        container+=
            `
                <tr>
                    <td class="mt-2">${i+1}</td>
                    <td class="mt-2">${finishedTasks[i]["name"]}</td>
                    <td ><input checked  type="checkbox" class="mt-2"></td>
                    <td>
                        <button class="btn btn-outline-danger" onclick="deleteFinshedTask(${i})">Delete</button>
                    </td>
                </tr>
             `

    }
    document.getElementById("finishedTask").innerHTML = container;
}


function deleteFinshedTask(ele)
{
    finishedTasks.splice(ele,1);
    localStorage.setItem("finshedTask",JSON.stringify(finishedTasks));
    displayFinishedTask();
}


search.addEventListener("keyup",function()
{
    let val = this.value
    let container="";
    for(var i=0;i<tasks.length;i++)
    {
        if(tasks[i].name.includes(val))
        {
            container+=
            `
                <tr>
                    <td class="mt-2">${i+1}</td>
                    <td class="mt-2">${tasks[i].name}</td>
                    <td ><input  onclick="testCheck(${i})" type="checkbox" class="mt-2"></td>
                    <td>
                        <button class="btn btn-outline-warning" onclick="getTask(${i})">Update</button>
                    </td>
                    <td>
                        <button class="btn btn-outline-danger" onclick="deleteTask(${i})">Delete</button>
                    </td>
                </tr>
            `

    }
    document.getElementById("tBody").innerHTML = container;
    }
})