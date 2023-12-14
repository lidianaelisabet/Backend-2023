const persiapanmemasakNasi = () => {
    return new Promise((resolve)=>{
        setTimeout(()=>{
            resolve("persiapanmemasakNasi");
        }, 1000);
    });
};
// untuk Mencuci Beras
const cuciBeras = ()=> {
    return new Promise((resolve)=>{
        setTimeout(()=>{
            resolve("cuciBeras");
        },2000);
    });
};
// untuk mengukur air
const mengukurAir = ()=> {
    return new Promise((resolve)=> {
        setTimeout(()=>{
            resolve("mengukurAir");
        },2000);
    });
};
// Menyalahkan Rice Cooker
const nyalahkanriceCooker = ()=> {
    return new Promise((resolve)=> {
        setTimeout(()=>{
            resolve("nyalahkanriceCooker");
        },2000);
    });
};


// consuming await vs promise

const main = async ()=>{
    console.log(await persiapanmemasakNasi());
    console.log(await cuciBeras());
    console.log(await mengukurAir());
    console.log(await nyalahkanriceCooker());
};

main();
