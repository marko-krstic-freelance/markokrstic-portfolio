require('dotenv').config();
const exec = require('child_process').exec;
const siteUrl = process.env.SITE_URL;

const command = `browser-sync start -p '${siteUrl}' --files '**/*.php' 'build/*.js' 'build/*.css'`;
exec(command, (error, stdout, stderr) => {
    if (error) {
        console.error(`exec error: ${error}`);
        return;
    }
    console.log(`stdout: ${stdout}`);
    console.error(`stderr: ${stderr}`);
});
