import React, { useEffect, useState } from 'react';

function Cards(props){

    return (
        <div className="card">
            <div className="card-body">
                <h5 className="card-title">{props.data.firstName + '  ' + props.data.lastName }</h5>
            </div>
        </div>
    )
}

export default Cards; 