# gutenberg-multiblock-setup
Perfect setup for multiple blocks in one plugin

<img width="1511" alt="gutenberg-multiblock-setup" src="https://github.com/krstivoja/gutenberg-multiblock-setup/assets/1234350/50a78075-92ff-4b97-9720-275edf855b02">

```
npx @wordpress/create-block@latest
```

Does not provide multiple blocks by default. This is why I decided to craete my own setup so I do not repeat my self. 

## Scripts: 

1. Create new block
2. Build (Production)
3. Start (Watch changes)
4. Server (Run local server)
5. Develop (Run local server and watch changes)
6. Update scripts

## Start 

1. Download project
2. Run ```npm i```
3. Aafter that you can create block, start or build blocks
4. duplicate .env-copy and make .env file
5. update your localhost url inside .env file


## Theme 

Besides blocks I also proved theme js and css. It's localed under ```src/theme```


## Block category

Update block category name under ```./inc/blockCategory.php``` and inside ```.package.json``` in ```"new-block": ... ```

## Block namespace

update it unde ```.package.json``` in ```"new-block": ... ```

## Create new block

1. Run "new-block" command. 
2. Fill required steps in terminal
3. Move craated folder from run under ```./src```
