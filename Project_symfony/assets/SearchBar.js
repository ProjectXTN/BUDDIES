import React, { useEffect, useState } from 'react';
import Cards from './Cards';

function SearchBar(){  

    //definition des variables d'etat
    const [data, setData] = useState([]);
    const [searchTxt, setSearchTxt] = useState("");

    //function qui permet le changement de valeur de la variable d'etat searchTxt
    function changeValeurSearch(e){
        setSearchTxt(e.currentTarget.value);
    }

    //useEffect qui surveille le changement de valeur de searchTxt
    //pour declencher un appel API vers le controlleur
    useEffect(()=>{
        fetch('/api/'+searchTxt)
        .then(function(headers){
            return headers.json();
        })
        .then(function(data){
            setData(data);
        })
    }, [searchTxt]);

    return(
        <>
            <div>Moteur de recherches</div>
            <div>
                <input type="text" onChange={changeValeurSearch} value={searchTxt} />
            </div>
            {
                data.map((element, i) => {
                    return <Cards key={i} data={element}></Cards>
                })
            }
        </>
    )
}

export default SearchBar;